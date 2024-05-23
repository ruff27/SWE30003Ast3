from django import forms
from django.contrib.auth.forms import AuthenticationForm, UserCreationForm
from .models import User  

class LoginForm(AuthenticationForm):
    # Define any additional form fields or customizations here if needed
    pass

class UserRegistrationForm(forms.ModelForm):
    class Meta:
        model = User
        fields = ['username', 'password', 'name', 'contact', 'is_customer', 'is_staff_member']