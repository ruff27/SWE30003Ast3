from .models import Customer

def attach_customer_to_order(user):
    try:
        customer = user.customer
    except Customer.DoesNotExist:
        customer = Customer.objects.create(user=user)
    return customer

def increment_points(order, customer):
    # Assuming each ordered menu item contributes 10 points
    points_to_add = order.ordered_menu_items.count() * 10
    customer.loyalty_points += points_to_add
    customer.save()