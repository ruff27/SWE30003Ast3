from django.db import models

class User(models.Model):
    user_id = models.AutoField(primary_key=True)
    username = models.CharField(max_length=100)
    password = models.CharField(max_length=100)
    role = models.CharField(max_length=100)
    name = models.CharField(max_length=100)
    contact = models.CharField(max_length=100)

class Customer(models.Model):
    customer_id = models.AutoField(primary_key=True)
    user = models.OneToOneField(User, on_delete=models.CASCADE)
    loyalty_points = models.IntegerField(default=0)

class Staff(models.Model):
    staff_id = models.AutoField(primary_key=True)
    user = models.OneToOneField(User, on_delete=models.CASCADE)
    position = models.CharField(max_length=100)
    salary = models.FloatField()
    hire_date = models.DateField()

class KitchenStaff(models.Model):
    kitchen_staff_id = models.AutoField(primary_key=True)
    staff = models.OneToOneField(Staff, on_delete=models.CASCADE)

class Feedback(models.Model):
    feedback_id = models.AutoField(primary_key=True)
    customer = models.ForeignKey(Customer, on_delete=models.CASCADE)
    feedback_content = models.TextField()

class Reservation(models.Model):
    reservation_id = models.AutoField(primary_key=True)
    customer = models.ForeignKey(Customer, on_delete=models.CASCADE)
    reservation_date = models.DateField()
    table_number = models.IntegerField()
    party_size = models.IntegerField()
    special_requests = models.TextField()

class Table(models.Model):
    table_number = models.IntegerField(primary_key=True)
    capacity = models.IntegerField()

class Order(models.Model):
    order_id = models.AutoField(primary_key=True)
    customer = models.ForeignKey(Customer, on_delete=models.CASCADE)
    order_date = models.DateField()
    total_amount = models.FloatField()
    status = models.CharField(max_length=100)

class OrderLine(models.Model):
    order_line_id = models.AutoField(primary_key=True)
    order = models.ForeignKey(Order, on_delete=models.CASCADE)
    menu_item = models.ForeignKey('MenuItem', on_delete=models.CASCADE)
    quantity = models.IntegerField()
    price = models.FloatField()

class MenuItem(models.Model):
    menu_item_id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=100)
    description = models.TextField()
    price = models.FloatField()
    available = models.BooleanField(default=True)

class Inventory(models.Model):
    inventory_id = models.AutoField(primary_key=True)
    menu_item = models.OneToOneField(MenuItem, on_delete=models.CASCADE)
    quantity = models.IntegerField()

class Payment(models.Model):
    payment_id = models.AutoField(primary_key=True)
    order = models.OneToOneField(Order, on_delete=models.CASCADE)
    payment_date = models.DateField()
    amount = models.FloatField()
    payment_method = models.CharField(max_length=100)
    status = models.CharField(max_length=100)
