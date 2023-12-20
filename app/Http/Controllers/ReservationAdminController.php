<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationAdminController extends Controller
{
    public function index(Request $request)
    {
        $reservation = Reservation::all();
        if($request->wantsJson()){
            $response = [
                'success' => true,
                'message' => 'Data Berhasil Diambil!',
                'data' => $reservation
            ];
            return response()->json($response, 200);
        }
        return view('admin/reservationManagement', [
            'reservation' => $reservation
        ]);
    }
}
