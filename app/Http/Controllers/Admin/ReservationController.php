<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Notifications\ReservationConfirmed;
use Illuminate\Http\Request;
// use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index', compact('reservations'));
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id)->delete();
        return redirect()->route('reservation.index');
    }

    public function status($id)
    {
        $Reservation = Reservation::find($id);
        $Reservation->status = true;
        $Reservation->save();

        notification::route('mail', $Reservation->email)->notify(new ReservationConfirmed());

        return redirect()->back();
    }
}
