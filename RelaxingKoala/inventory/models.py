from django.db import models
from menu.models import MenuItem
# Create your models here.
class Inventory(models.Model):
    menu_item = models.OneToOneField(MenuItem, on_delete=models.CASCADE)
    quantity = models.IntegerField()

class Supplier(models.Model):
    name = models.CharField(max_length=255)
    contact_info = models.TextField()

class Payment(models.Model):
    order = models.OneToOneField('menu.Order', on_delete=models.CASCADE)
    payment_date = models.DateField()
    amount = models.FloatField()
    payment_method = models.CharField(max_length=50)
    status = models.CharField(max_length=50)