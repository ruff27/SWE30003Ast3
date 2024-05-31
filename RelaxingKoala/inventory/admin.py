from django.contrib import admin
from .models import Inventory, Supplier, Payment

admin.site.register(Inventory)
admin.site.register(Supplier)
admin.site.register(Payment)