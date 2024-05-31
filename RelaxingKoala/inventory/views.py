from django.shortcuts import render
from .models import Inventory

def inventory_view(request):
    inventory_items = Inventory.objects.all()
    return render(request, 'inventory/inventory.html', {'inventory_items': inventory_items})
