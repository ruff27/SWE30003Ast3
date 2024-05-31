from django.shortcuts import render, get_object_or_404
from django.http import JsonResponse, HttpResponseBadRequest
from .models import Inventory

def inventory_view(request):
    inventory_items = Inventory.objects.all()
    return render(request, 'inventory/inventory.html', {'inventory_items': inventory_items})

def order_item(request):
    if request.method == 'POST':
        item_id = request.POST.get('item_id')
        quantity = int(request.POST.get('quantity'))
        item = get_object_or_404(Inventory, id=item_id)
        try:
            item.reduce_quantity(quantity)
            return JsonResponse({"message": "Order successful"})
        except ValueError as e:
            return HttpResponseBadRequest(str(e))
    return HttpResponseBadRequest("Invalid request method")