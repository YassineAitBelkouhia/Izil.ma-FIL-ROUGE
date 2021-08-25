<?php

namespace App\Http\Controllers;

use App\Models\Riad;
use App\Models\Booking;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Scope;

class RiadAvailability extends Controller
{


    public function checkAvailability(Request $request, $id)
    {
        $request->validate([
            'from' => 'required|date_format:Y-m-d|after_or_equal:now',
            'to' => 'required|date_format:Y-m-d|after_or_equal:from',
        ]);

        $riad = Riad::findOrFail($id);
        $riadBookings = $riad->bookings;
        return $riadBookings->where('to', '>=', $request->from)->where('from', '<=', $request->to)->count();
    }
}
