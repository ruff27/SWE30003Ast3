from django import forms
from django.contrib.auth.forms import AuthenticationForm, UserCreationForm
from .models import User  

class LoginForm(AuthenticationForm):
    # Define any additional form fields or customizations here if needed
    pass

class UserRegistrationForm(UserCreationForm):
    class Meta:
        model = User
        fields = ['username', 'password1', 'password2', 'name', 'contact', 'is_customer', 'is_staff_member']
