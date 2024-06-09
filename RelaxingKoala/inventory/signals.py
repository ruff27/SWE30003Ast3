from django.db.models.signals import post_save
from django.dispatch import receiver
from django.utils import timezone
from .models import Inventory, Supplier

@receiver(post_save, sender=Inventory)
def check_inventory_threshold(sender, instance, **kwargs):
    if instance.quantity < 5:
        supplier = Supplier.objects.first()
        if supplier:
            supplier.restock_item = instance.item_name
            supplier.restock_quantity = 10 
            supplier.restock_requested_at = timezone.now()
            supplier.save()
