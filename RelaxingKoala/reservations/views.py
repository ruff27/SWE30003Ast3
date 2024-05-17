from django.shortcuts import render, redirect
from .forms import ReservationForm

# Create your views here.
def reserve_table(request):
    if request.method == 'POST':
        form = ReservationForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('reservation_confirmation')
    else:
        form = ReservationForm()
    return render(request, 'reservations/reserve.html', {'form': form})