from django.db import models
from django.utils import timezone

class Inventory(models.Model):
    item_name = models.CharField(max_length=255, default="Unknown")
    quantity = models.IntegerField()

    def __str__(self):
        return self.item_name

    def reduce_quantity(self, quantity):
        if self.quantity < quantity:
            raise ValueError("Not enough inventory to fulfill the order")
        self.quantity -= quantity
        self.save()
        if self.quantity < 5:
            supplier, created = Supplier.objects.get_or_create(name="Default Supplier")
            supplier.restock_item = self.item_name
            supplier.restock_quantity = 10  # Example restock quantity
            supplier.restock_requested_at = timezone.now()
            supplier.save()
        return self.quantity
    


class Supplier(models.Model):
    name = models.CharField(max_length=255)
    contact_info = models.TextField()
    restock_item = models.CharField(max_length=255, blank=True, null=True)
    restock_quantity = models.IntegerField(blank=True, null=True)
    restock_requested_at = models.DateTimeField(blank=True, null=True)