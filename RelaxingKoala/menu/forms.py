from django import forms
from .models import MenuItem, Order, Payment

class MenuItemForm(forms.ModelForm):
    class Meta:
        model = MenuItem
        fields = ['name', 'description', 'price', 'inventory_item']

class OrderForm(forms.ModelForm):
    class Meta:
        model = Order
        fields = ['customer', 'ordered_menu_items']


class PaymentForm(forms.ModelForm):
    class Meta:
        model = Payment
        fields = ['credit_card_number', 'expiration_date', 'amount']
