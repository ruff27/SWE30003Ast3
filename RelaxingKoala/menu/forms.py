from django import forms
from .models import MenuItem, Order, Payment
from reservations.models import Reservation

class MenuItemForm(forms.ModelForm):
    class Meta:
        model = MenuItem
        fields = ['name', 'description', 'price', 'inventory_item']

class OrderForm(forms.ModelForm):
    class Meta:
        model = Order
        fields = ['ordered_menu_items']

    def __init__(self, *args, **kwargs):
        user = kwargs.pop('user', None)
        super(OrderForm, self).__init__(*args, **kwargs)
        self.fields['ordered_menu_items'].widget = forms.CheckboxSelectMultiple()
        self.fields['ordered_menu_items'].queryset = MenuItem.objects.all()

class PaymentForm(forms.ModelForm):
    class Meta:
        model = Payment
        fields = ['credit_card_number', 'expiration_date']
        widgets = {
            'expiration_date': forms.TextInput(attrs={'placeholder': 'MM/YY'}),
        }

    def __init__(self, *args, **kwargs):
        super(PaymentForm, self).__init__(*args, **kwargs)
        self.fields['credit_card_number'].widget = forms.TextInput(attrs={'placeholder': 'Credit Card Number'})
        self.fields['expiration_date'].widget = forms.TextInput(attrs={'placeholder': 'MM/YY'})
