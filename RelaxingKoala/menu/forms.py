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
        fields = ['customer', 'ordered_menu_items']


class PaymentForm(forms.ModelForm):
    class Meta:
        model = Payment
        fields = ['credit_card_number', 'expiration_date', 'amount']

class ReservationForm(forms.ModelForm):
    class Meta:
        model = Reservation
        fields = ['id']  # Assuming you want to select existing reservations by ID
        widgets = {'id': forms.RadioSelect}

    def __init__(self, user, *args, **kwargs):
        super().__init__(*args, **kwargs)
        self.fields['id'].queryset = kwargs.pop('queryset', Reservation.objects.none())