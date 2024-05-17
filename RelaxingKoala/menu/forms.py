from django import forms
from .models import MenuItem, Order

class MenuItemForm(forms.ModelForm):
    class Meta:
        model = MenuItem
        fields = ['name', 'description', 'price', 'inventory_item']

class OrderForm(forms.ModelForm):
    class Meta:
        model = Order
        fields = ['customer', 'ordered_menu_items']