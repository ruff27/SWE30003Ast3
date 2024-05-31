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
    print("checkout_order view called")
    
    if request.method == 'POST':
        print("POST request received")
        print(f"POST data: {request.POST}")
        
        order_form = OrderForm(request.POST)
        payment_form = PaymentForm(request.POST)
        
        if order_form.is_valid() and payment_form.is_valid():
            print("Both forms are valid")
            
            with transaction.atomic():
                order = order_form.save(commit=False)
                ordered_menu_items = order_form.cleaned_data.get('ordered_menu_items')
                print(f"Ordered menu items: {ordered_menu_items}")
                
                total_cost = sum(item.price for item in ordered_menu_items)
                print(f"Total cost: {total_cost}")

                customer, _ = Customer.objects.get_or_create(user=request.user)
                print(f"Customer: {customer}")
                
                order.customer = customer
                order.save()
                order.ordered_menu_items.set(ordered_menu_items)

                payment = payment_form.save(commit=False)
                payment.amount = total_cost
                payment.order = order
                payment.save()

                for item in ordered_menu_items:
                    inventory_item = item.inventory_item
                    print(f"Reducing quantity for item: {inventory_item}")
                    inventory_item.reduce_quantity(1)

                request.session.pop('ordered_menu_items', None)
                return redirect('menu:order_detail', order_id=order.id)
        else:
            print("Form validation failed")
            print(f"Order form errors: {order_form.errors}")
            print(f"Payment form errors: {payment_form.errors}")
            
            request.session['ordered_menu_items'] = request.POST.getlist('ordered_menu_items')
            print(f"Session ordered_menu_items: {request.session['ordered_menu_items']}")
            selected_items = MenuItem.objects.filter(id__in=request.POST.getlist('ordered_menu_items'))
    else:
        ordered_items_ids = request.session.get('ordered_menu_items', [])
        print(f"Ordered items from session: {ordered_items_ids}")
        
        order_form = OrderForm(initial={'ordered_menu_items': ordered_items_ids})
        payment_form = PaymentForm()
        selected_items = MenuItem.objects.filter(id__in=ordered_items_ids)
        print(f"Selected items: {selected_items}")

    if request.method == 'POST' and not order_form.is_valid():
        selected_items = MenuItem.objects.filter(id__in=request.POST.getlist('ordered_menu_items'))
        print(f"Selected items after invalid form submission: {selected_items}")
    else:
        if 'selected_items' not in locals():
            selected_items = []

    total_cost = sum(item.price for item in selected_items)
    print(f"Total cost calculated: {total_cost}")

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
