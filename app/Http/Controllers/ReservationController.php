<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        if (!isset($request->name) ||
            !isset($request->email) ||
            !isset($request->phone) ||
            !isset($request->guest) ||
            !isset($request->date) ||
            !isset($request->time)
        ) {
            return abort(400, 'Missing field(s)');
        }

        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->guest = $request->guest;
        $reservation->date = Carbon::parse($request->date)->format('Y-m-d\TH:i');
        $reservation->time = $request->time;
        $reservation->message = $request->message ?? null;

        $reservation->save();
        return redirect()->back();

    }

    public function reservations() {
        $data = Reservation::all();
        return view('admin.reservations', compact('data'));
    }
}
