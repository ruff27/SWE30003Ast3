from django.db import models
from django.utils import timezone
from accounts.models import Customer
from menu.models import Order
from datetime import date, timedelta
import uuid

def default_end_time():
    return timezone.now() + timedelta(hours=1)

class Table(models.Model):
    id = models.AutoField(primary_key=True, default= 1)
    number = models.IntegerField(unique=True, default= 1)
    capacity = models.IntegerField()

class Reservation(models.Model):
    start_time = models.DateTimeField(default=timezone.now)
    end_time = models.DateTimeField(default=default_end_time)
    table = models.ForeignKey(Table, on_delete=models.CASCADE)
    customer = models.ForeignKey(Customer, on_delete=models.CASCADE)
    order = models.OneToOneField(Order, on_delete=models.CASCADE, default=None, blank=True, null=True)
    reserved_at = models.DateTimeField(default=timezone.now)
    expires_at = models.DateTimeField(default=default_end_time)

    @property
    def is_expired(self):
        return self.expires_at < timezone.now()
    
    @classmethod
    def get_user_reservations_today(cls, user):
        today = date.today()
        return cls.objects.filter(user=user, date=today)

