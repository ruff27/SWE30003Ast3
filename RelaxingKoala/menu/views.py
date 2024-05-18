from django.shortcuts import render, redirect
from django.contrib.auth.decorators import login_required
from .models import MenuItem, Order, OrderLine, Payment
from .forms import MenuItemForm, OrderForm, PaymentForm

# Create your views here.
def order_menu(request):
    menu_items = MenuItem.objects.filter(available=True)
    return render(request, 'menu/order.html', {'menu_items': menu_items})

def checkout_order(request):
    if request.method == 'POST':
        order_form = OrderForm(request.POST)
        payment_form = PaymentForm(request.POST)
        if order_form.is_valid() and payment_form.is_valid():
            order = order_form.save(commit=False)
            order.customer = request.user.customer
            order.save()
            payment = payment_form.save(commit=False)
            payment.save()
            return redirect('order_detail', order_id=order.id)
    else:
        order_form = OrderForm()
        payment_form = PaymentForm()
    return render(request, 'menu/checkout.html', {'order_form': order_form, 'payment_form': payment_form})
def order_detail(request, order_id):
    order = Order.objects.get(id=order_id)
    return render(request, 'menu/order_detail.html', {'order': order})

def add_menu_item(request):
    if not request.user.is_staff_member:
        return redirect('home')  # Redirect non-staff to home page
    if request.method == 'POST':
        form = MenuItemForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('menu')  # Redirect to menu page after adding item
    else:
        form = MenuItemForm()
    return render(request, 'add_menu_item.html', {'form': form})