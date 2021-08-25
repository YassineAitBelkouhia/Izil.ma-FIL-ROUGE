<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Riad;
use App\Models\User;
use App\Models\Review;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Booking::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'from' => 'required|date_format:Y-m-d|after_or_equal:now',
            'to' => 'required|date_format:Y-m-d|after_or_equal:from',
            'riad_id' => 'required',
            'user_id' => 'required',
        ]);


        return Booking::create($request->all());
    }

    public function getTotalPrice($id)
    {
        $booking = Booking::find($id);
        $riad = Riad::where('id', $booking->riad_id)->get('price_night');
        $pricepernight = $riad[0]['price_night'];

        $days = (new Carbon($booking->from))->diffInDays(new Carbon($booking->to));
        $price = $days *  $pricepernight;

        return $price;
    }

    public function getUserBookings($id)
    {
        // $user = User::find($id);
        // return ($user->id);
        $bookings = Booking::where('user_id', $id)->get();
        return $bookings;
    }

    public function getBookingReview($id)
    {
        $review = Review::where('booking_id', $id)->get('id');
        return $review[0];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Booking::find($id);
    }

    public function getRiadBooking($riad_id)
    {
        return Booking::where('riad_id', $riad_id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->update($request->all());
        return $booking;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Booking::destroy($id);
    }
}
