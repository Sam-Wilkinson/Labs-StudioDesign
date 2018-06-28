<?php

namespace App\Http\Controllers;

use App\Newsemail;
use Illuminate\Http\Request;

class NewsemailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Newsemail::orderby('created_at','desc')->get();
        return view('admin.news.index',compact('emails'));
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
     * @param  \App\Newsemail  $newsemail
     * @return \Illuminate\Http\Response
     */
    public function show(Newsemail $newsemail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsemail  $newsemail
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsemail $newsemail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsemail  $newsemail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsemail $newsemail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsemail  $newsemail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsemail $newsemail)
    {
        if($newsemail->delete()){
            return redirect()->route('newsemails.index')->with([
                "status"=> "Sorry to see them go!",
                "message"=> "You have successfully archived the email",
                "color"=> "success"
            ]);
        }else{
            return redirect()->route('newsemails.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the email was not archived",
                "color"=> "danger"
            ]);
        }
    }
}
