from django.db import models
from accounts.models import Customer
from inventory.models import Inventory
# Create your models here.
class MenuItem(models.Model):
    name = models.CharField(max_length=255)
    description = models.TextField()
    price = models.FloatField()
    available = models.BooleanField(default=True)
    inventory_item = models.ForeignKey('Inventory', on_delete=models.CASCADE)
    def __str__(self):
        return self.name

class Order(models.Model):
    customer = models.ForeignKey(Customer, on_delete=models.CASCADE)
    order_date = models.DateField()
    total_amount = models.FloatField()
    status = models.CharField(max_length=50)

class OrderLine(models.Model):
    order = models.ForeignKey(Order, on_delete=models.CASCADE)
    menu_item = models.ForeignKey(MenuItem, on_delete=models.CASCADE)
    quantity = models.IntegerField()
    price = models.FloatField()