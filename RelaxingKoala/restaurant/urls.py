from django.urls import path
from . import views

urlpatterns = [
    path('menu/', views.menu_view, name='menu'),
    path('reservation/', views.reservation_view, name='reservation'),
    # Add more URL patterns as needed
]
