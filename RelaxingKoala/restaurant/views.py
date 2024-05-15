from django.shortcuts import render
from django.http import HttpResponse

def menu_view(request):
    return HttpResponse("This is the menu page")

def reservation_view(request):
    return HttpResponse("This is the menu page")