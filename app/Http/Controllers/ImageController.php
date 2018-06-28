<?php

namespace App\Http\Controllers;

use App;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Image::where('location','carousel')->get();
        $youtube = Image::where('location','youtube')->get();
        return view('admin.images.index',compact('carousels','youtube'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->location == 'youtube'){
            $youtube = Image::where('location','youtube')->get();
            App::make('ImageDelete')->imageDelete($youtube[0]->name, 'fronts');
            $youtube[0]->delete();
        }
        $image = new Image;
        $image->location = $request->location;
        $image->name = App::make('ImageResize')->imageStore($request->name, 'fronts',1846 , null);
        if($image->save()){
            return redirect()->route('images.index')->with([
                "status"=> "Success",
                "message"=> "You have successfully added an image to $request->location",
                "color"=> "success"
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        App::make('ImageDelete')->imageDelete($image->name, 'fronts');
        
        if($image->delete()){
            return redirect()->route('images.index')->with([
                "status"=> "Sorry to see them go!",
                "message"=> "You have successfully removed the Image",
                "color"=> "success"
            ]);
        }else{
            return redirect()->route('images.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the Image was not archived",
                "color"=> "danger"
            ]);
        }
    }
}
