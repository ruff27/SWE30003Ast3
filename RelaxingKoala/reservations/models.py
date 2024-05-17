from django.db import models
from accounts.models import Customer
# Create your models here.
class Table(models.Model):
    table_number = models.IntegerField(primary_key=True)
    capacity = models.IntegerField()

class Reservation(models.Model):
    customer = models.ForeignKey(Customer, on_delete=models.CASCADE)
    reservation_date = models.DateField()
    table = models.ForeignKey(Table, on_delete=models.CASCADE)
    party_size = models.IntegerField()
    special_requests = models.TextField(blank=True, null=True)