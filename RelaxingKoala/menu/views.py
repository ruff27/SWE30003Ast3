from django.shortcuts import render, redirect, get_object_or_404
from django.contrib import messages
from .models import MenuItem, Order
from .forms import OrderForm, PaymentForm, ReservationForm, MenuItemForm
from reservations.models import Reservation
from .utils import attach_customer_to_order, increment_points
from django.http import HttpResponseRedirect


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

            # Calculate Total
            ordered_menu_items = order_form.cleaned_data.get('ordered_menu_items')
            total_cost = sum(item.price for item in ordered_menu_items)

            #Process ordered menu items
            ordered_menu_items = order_form.cleaned_data['ordered_menu_items']
            total_amount = 0
            for item_id in ordered_menu_items:
                menu_item = MenuItem.objects.get(pk=item_id)
                # Reduce inventory count
                inventory_item = menu_item.inventory_item
                inventory_item.quantity -= 1  # Assuming each menu item reduces inventory count by 1
                inventory_item.save()

            # Attach the order to the user's account if they are logged in
            if request.user.is_authenticated:
                customer = attach_customer_to_order(request.user)
                order.customer = customer
                order.save()

                # Increment points by 10 for every product ordered
                increment_points(order, customer)

                # Check if the user has existing reservations for today
                user_reservations_today = Reservation.get_user_reservations_today(request.user)

                if user_reservations_today.exists():
                    # Pass existing reservations to the form if user has reservations
                    reservation_form = ReservationForm(user=request.user, queryset=user_reservations_today)
                    context = {'order_form': order_form, 'payment_form': payment_form, 'reservation_form': reservation_form}
                    return render(request, 'menu/checkout.html', context)
                else:
                    # Reserve a table for 1 hour if the user has no reservations
                    reservation = Reservation.objects.reserve_table(request.user)
                    if reservation:
                        # Proceed with payment
                        payment = payment_form.save(commit=False)
                        payment.save()
                        return redirect('order_detail', order_id=order.id)
                    else:
                        # Display message if all tables are full
                        messages.error(request, 'Sorry, all tables are full.')
                        return redirect('order_menu')
            # Proceed with payment without reserving a table for anonymous users
            else:
                payment = payment_form.save(commit=False)
                payment.save()
                return redirect('order_detail', order_id=order.id)
        else:
            messages.error(request, 'Please correct the errors in the form.')
    else:
        order_form = OrderForm()
        payment_form = PaymentForm()
    return render(request, 'menu/checkout.html', {'order_form': order_form, 'payment_form': payment_form})

def order_detail(request, order_id):
    order = get_object_or_404(Order, id=order_id)
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