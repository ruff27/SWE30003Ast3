# Generated by Django 4.2.9 on 2024-05-31 07:57

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('inventory', '0002_remove_inventory_menu_item_inventory_item_name'),
    ]

    operations = [
        migrations.DeleteModel(
            name='Payment',
        ),
    ]
