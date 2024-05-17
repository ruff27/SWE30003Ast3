from django.shortcuts import render, redirect
from .models import MenuItem, Order, OrderLine
from .forms import MenuItemForm, OrderForm

# Create your views here.
def order_menu(request):
    menu_items = MenuItem.objects.filter(available=True)
    return render(request, 'menu/order.html', {'menu_items': menu_items})

def checkout_order(request):
    if request.method == 'POST':
        form = OrderForm(request.POST)
        if form.is_valid():
            order = form.save()
            return redirect('order_detail', order_id=order.id)
    else:
        form = OrderForm()
    return render(request, 'menu/checkout.html',  {'form': form})

def order_detail(request, order_id):
    order = Order.objects.get(id=order_id)
    return render(request, 'menu/order_detail.html', {'order': order})

def add_menu_item(request):
    if request.method == 'POST':
        form = MenuItemForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('menu')  # Redirect to menu page after adding item
    else:
        form = MenuItemForm()
    return render(request, 'add_menu_item.html', {'form': form})