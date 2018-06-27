<?php

namespace App\Http\Controllers;

use App\Text;
use Illuminate\Http\Request;
use App\Http\Requests\StoreText;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texts = Text::orderby('id','desc')->get();
        return view('admin.texts.index',compact('texts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function show(Text $text)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function edit(Text $text)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function update(StoreText $request, Text $text)
    {
        $text->content = $request->text;
        if($text->save()){
            return redirect()->route('texts.index')->with([
                "status"=> "Success",
                "message"=> "You have successfully updated the text",
                "color"=> "success"
            ]);
        }else{
            return redirect()->route('users.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the text were not modified",
                "color"=> "danger"
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function destroy(Text $text)
    {
        //
    }
}
