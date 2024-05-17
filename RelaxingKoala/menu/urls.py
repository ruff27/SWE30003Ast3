from django.urls import path
from . import views
from .views import order_menu, checkout_order,add_menu_item

urlpatterns = [
    path('order/', order_menu, name='order_menu'),
    path('checkout/', checkout_order, name='checkout_order'),
    path('add/', add_menu_item, name='add_menu_item'),
    path('order/<int:order_id>/', views.order_detail, name='order_detail'),

]
