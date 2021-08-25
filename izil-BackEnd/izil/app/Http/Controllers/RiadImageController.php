<?php

namespace App\Http\Controllers;

use App\Models\Riad;
use App\Models\RiadImage;
use Illuminate\Http\Request;

class RiadImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return RiadImage::all();
    // }

    public function getRiadImage($riad_id)
    {
        // return RiadImage::all()->where(['riad_id' => $riad_id]);
        return RiadImage::where('riad_id', $riad_id)->get();
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
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'riad_id' => 'required',
        ]);

        $riadTitle = Riad::find($request->riad_id)->title;

        $imgaeName = time() . '-' . str_replace(' ', '', $riadTitle)  . '-display_image.' .  $request->image->extension();
        $request->image->move(public_path('images'), $imgaeName);

        return RiadImage::create([
            'image_path' =>  $imgaeName,
            'riad_id' =>  $request->riad_id,
        ]);
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



    //     $riadImage = RiadImage::find($id);
    //     $riadTitle = Riad::find($riadImage->riad_id)->title;
    //     $imgaeName = time() . '-' . str_replace(' ', '', $riadTitle)  . '-display_image.jpg';
    //     // $request->image->move(public_path('images'), $imgaeName);

    //     $riadImage->update([
    //         'image_path' =>  $imgaeName,
    //     ]);
    //     return $riadImage;
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return RiadImage::destroy($id);
    }
}
