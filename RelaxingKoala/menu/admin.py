from django.contrib import admin
from .models import MenuItem, Order, OrderLine, Payment

admin.site.register(MenuItem)
admin.site.register(Order)
admin.site.register(OrderLine)
admin.site.register(Payment)