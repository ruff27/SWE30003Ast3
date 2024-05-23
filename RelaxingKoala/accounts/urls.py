from django.urls import path
from .views import login_view, register
from . import views
from django.contrib.auth.views import LoginView


urlpatterns = [
    path('login/', login_view, name='login'),
    #path('accounts/login/', LoginView.as_view(), name='login'),
    path('register/', register, name='register'),
    path('', views.home, name='home'),
]
