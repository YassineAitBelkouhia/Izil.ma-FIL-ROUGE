<?php

namespace App\Http\Controllers;

use App\Models\Riad;
use Illuminate\Http\Request;

class RiadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Riad::all();
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
            'title' => 'required',
            'description' => 'required',
            'price_night' => 'required',
            'numberOfRooms' => 'required',
            'numberOfBathrooms' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'city' => 'required',
        ]);

        $imgaeName = time() . '-' . str_replace(' ', '', $request->title)  . '-main_image.' . $request->image->extension();
        $request->image->move(public_path('images'), $imgaeName);

        return Riad::create([
            'title' => $request->title,
            'rating' => $request->rating,
            'city' => $request->city,
            'description' => $request->description,
            'price_night' => $request->price_night,
            'numberOfRooms' => $request->numberOfRooms,
            'numberOfBathrooms' => $request->numberOfBathrooms,
            'image_path' =>  $imgaeName,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Riad::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $riad = Riad::find($id);
    //     $riad->update($request->all());
    //     return $riad;
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Riad::destroy($id);
    }


    /**
     * Search for a specific Riad.
     *
     * @param  str  $title
     * @return \Illuminate\Http\Response
     */
    public function searchByTitle($title)
    {
        return Riad::where('title', 'like', '%' . $title . '%')->get();
    }
    /**
     * Search for a specific Riad by City Name.
     *
     * @param  str  $city
     * @return \Illuminate\Http\Response
     */
    public function searchByCity($city)
    {
        return Riad::where('city', 'like', '%' . $city . '%')->get();
    }

    public function averageRating($id)
    {
        $riad = Riad::find($id);
        $averageRating = $riad->reviews->avg('rating');
        return $averageRating;
    }
}
