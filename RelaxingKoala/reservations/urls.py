from django.urls import path
from .views import reserve_table

app_name = 'reservations'

urlpatterns = [
    path('reserve/', reserve_table, name='reserve_table'),
]
