<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationAdminController extends Controller
{
    public function index()
    {
        $reservation = Reservation::all();
        return view('admin/reservationManagement', [
            'reservation' => $reservation
        ]);
    }
}
