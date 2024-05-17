# Generated by Django 4.2.9 on 2024-05-16 13:01

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
        ('menu', '0001_initial'),
    ]

    operations = [
        migrations.CreateModel(
            name='Supplier',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=255)),
                ('contact_info', models.TextField()),
            ],
        ),
        migrations.CreateModel(
            name='Payment',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('payment_date', models.DateField()),
                ('amount', models.FloatField()),
                ('payment_method', models.CharField(max_length=50)),
                ('status', models.CharField(max_length=50)),
                ('order', models.OneToOneField(on_delete=django.db.models.deletion.CASCADE, to='menu.order')),
            ],
        ),
        migrations.CreateModel(
            name='Inventory',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('quantity', models.IntegerField()),
                ('menu_item', models.OneToOneField(on_delete=django.db.models.deletion.CASCADE, to='menu.menuitem')),
            ],
        ),
    ]