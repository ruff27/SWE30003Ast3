from django.urls import path
from .views import reserve_table, reservation_confirmation

app_name = 'reservations'

urlpatterns = [
    path('reserve/', reserve_table, name='reserve_table'),
    path('confirmation/<int:reservation_id>/', reservation_confirmation, name='confirmation'),  

]
