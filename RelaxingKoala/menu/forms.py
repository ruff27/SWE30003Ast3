from django import forms
from .models import MenuItem, Inventory 

class MenuItemForm(forms.ModelForm):
    class Meta:
        model = MenuItem
        fields = ['name', 'description', 'price', 'inventory_item']