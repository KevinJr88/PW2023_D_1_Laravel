<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
class ReservationController extends Controller
{
    public function index()
    {
        return view('UserView.Reservation');
    }
    public function store(Request $request)
    {
        
            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required',
                'date' => 'required',
                'people' => 'required',
                'message' => 'required'
            ]);
            $reservationData = $request->all();
            $reservationData['id_user'] = auth()->user()->id_user;
            Reservation::create($reservationData);
            $response = [
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
                'data' => $reservationData
            ];

            if ($request->wantsJson()) {
                return response()->json($response, 201);
            }
            return
            redirect()->route('reservation.index')->with([
                'success' => 'Data Berhasil Disimpan!',
                'data' => $reservationData
            ]);
        
    }
}
