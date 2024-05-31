from django.shortcuts import render, redirect, get_object_or_404
from django.contrib.auth.decorators import login_required
from django.contrib import messages
from .forms import ReservationForm
from .models import Reservation

@login_required
def reserve_table(request):
    if request.method == 'POST':
        form = ReservationForm(request.POST)
        if form.is_valid():
            reservation = form.save(commit=False)
            reservation.customer = request.user.customer
            reservation.save()
            messages.success(request, 'Table reserved successfully!')
            return redirect('reservations:reservation_confirmation', reservation_id=reservation.reservation_id)
        else:
            messages.error(request, 'Failed to reserve table. Please check the form data.')
    else:
        form = ReservationForm()
    return render(request, 'reservations/reserve.html', {'form': form})


@login_required
def reservation_confirmation(request, reservation_id):
    reservation = get_object_or_404(Reservation, reservation_id = reservation_id)
    return render(request, 'reservations/confirmation.html', {'reservation': reservation})