from django.shortcuts import render, redirect, get_object_or_404 
from django.contrib import messages
from .models import MenuItem, Order, Payment, Customer
from .forms import OrderForm, PaymentForm, MenuItemForm
from django.utils import timezone
from django.db import transaction
from django.contrib.auth.decorators import login_required
from django.db.models import Sum


def order_menu(request):
    menu_items = MenuItem.objects.filter(available=True)
    return render(request, 'menu/order.html', {'menu_items': menu_items})

@login_required
def checkout_order(request):
    if request.method == 'POST':
        order_form = OrderForm(request.POST)
        payment_form = PaymentForm(request.POST)
        if order_form.is_valid() and payment_form.is_valid():
            with transaction.atomic():
                order = order_form.save(commit=False)
                ordered_menu_items = order_form.cleaned_data.get('ordered_menu_items')
                total_cost = sum(item.price for item in ordered_menu_items)

                # Ensure the customer is set
                if request.user.is_authenticated:
                    customer, created = Customer.objects.get_or_create(user=request.user)
                    order.customer = customer
                else:
                    return redirect('login')  # Redirect to login if user is not authenticated

                order.save()
                order.ordered_menu_items.set(ordered_menu_items)

                payment = payment_form.save(commit=False)
                payment.amount = total_cost
                payment.order = order  

                payment.save()

                for item in ordered_menu_items:
                    inventory_item = item.inventory_item
                    inventory_item.reduce_quantity(1)  # Assuming a quantity of 1 for this situation
                    
                # Clear the session data
                request.session.pop('ordered_menu_items', None)
                return redirect('menu:order_detail', order_id=order.id)
        else:
            # Save ordered items in session
            request.session['ordered_menu_items'] = request.POST.getlist('ordered_menu_items')
            messages.error(request, 'Please correct the errors in the form.')
            selected_items = MenuItem.objects.filter(id__in=request.POST.getlist('ordered_menu_items'))
    else:
        ordered_items_ids = request.session.get('ordered_menu_items', [])
        order_form = OrderForm(initial={'ordered_menu_items': ordered_items_ids})
        payment_form = PaymentForm()
        selected_items = MenuItem.objects.filter(id__in=ordered_items_ids)

    if request.method == 'POST' and not order_form.is_valid():
        selected_items = MenuItem.objects.filter(id__in=request.POST.getlist('ordered_menu_items'))

    total_cost = sum(item.price for item in selected_items)

    return render(request, 'menu/checkout.html', {
        'order_form': order_form,
        'payment_form': payment_form,
        'total_cost': total_cost,
        'selected_items': selected_items,
    })


def order_detail(request, order_id):
    order = get_object_or_404(Order, id=order_id)
    total_cost = order.ordered_menu_items.aggregate(total=Sum('price'))['total']  
    context = {
        'order': order,
        'total_cost': total_cost,
    }
    return render(request, 'menu/order_detail.html', context)

def add_menu_item(request):
    if not request.user.is_staff:
        return redirect('home')  # Redirect non-staff to home page
    if request.method == 'POST':
        form = MenuItemForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('menu')  # Redirect to menu page after adding item
    else:
        form = MenuItemForm()
    return render(request, 'add_menu_item.html', {'form': form})
