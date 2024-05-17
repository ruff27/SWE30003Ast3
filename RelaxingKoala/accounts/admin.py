from django.contrib import admin
from .models import User, Customer, Staff, KitchenStaff
# Register your models here.
admin.site.register(User)
admin.site.register(Customer)
admin.site.register(Staff)
admin.site.register(KitchenStaff)