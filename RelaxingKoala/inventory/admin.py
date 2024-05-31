from django.contrib import admin
from .models import Inventory, Supplier

@admin.register(Inventory)
class InventoryAdmin(admin.ModelAdmin):
    list_display = ('item_name', 'quantity')
    search_fields = ('item_name',)
    actions = ['restock_inventory']

    def restock_inventory(self, request, queryset):
        for item in queryset:
            item.quantity += 10  # Adjust this number as needed
            item.save()
        self.message_user(request, "Selected items have been restocked.")
    restock_inventory.short_description = "Restock selected items by 10 units"

@admin.register(Supplier)
class SupplierAdmin(admin.ModelAdmin):
    list_display = ('name', 'contact_info')
    search_fields = ('name',)
