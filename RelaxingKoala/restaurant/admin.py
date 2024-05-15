from django.contrib import admin
from .models import Customer, Staff, KitchenStaff, Feedback, Reservation, Table, Order, OrderLine, MenuItem, Inventory, Payment

# Register your models here
admin.site.register(Customer)
admin.site.register(Staff)
admin.site.register(KitchenStaff)
admin.site.register(Feedback)
admin.site.register(Reservation)
admin.site.register(Table)
admin.site.register(Order)
admin.site.register(OrderLine)
admin.site.register(MenuItem)
admin.site.register(Inventory)
admin.site.register(Payment)
