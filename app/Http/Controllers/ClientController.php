<?php

namespace App\Http\Controllers;

use App;
use App\Client;
use Illuminate\Http\Request;
use App\Testimonial;
use App\Http\Requests\StoreClient;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderby('created_at', 'desc')->get();
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClient $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->company = $request->company;
        $client->position = $request->position;
        $client->image = App::make('ImageResize')->imageStore($request->image, 'clients', 60 , 60);
        $client->save();

        $testimonial = new Testimonial;
        $testimonial->content = $request->testimonial;
        $testimonial->clients_id = $client->id;
        if($testimonial->save()){
        return redirect()->route('clients.index')->with([
            "status"=> "Success",
            "message"=> "You have successfully added a Client and their Testimonial",
            "color"=> "success"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $testimonials = $client->testimonials;
        return view('admin.clients.update',compact('client','testimonials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->name = $request->name;
        $client->company = $request->company;
        $client->position = $request->position;
        if($request->image != null){
            if($client->image != null){
                App::make('ImageDelete')->imageDelete($client->image, 'clients');
            }
        $client->image = App::make('ImageResize')->imageStore($request->image, 'clients', 60 , 60);
        }
        $client->save();

        foreach($client->testimonials as $clientTestimonial){
            $clientTestimonial->delete();
        }
        
        foreach($request->testimonials as $requestTestimonial){
            if($requestTestimonial != null){
                $testimonial = new Testimonial;
                $testimonial->content = $requestTestimonial;
                $testimonial->clients_id = $client->id;
                $testimonial->save();
            }
        }
        return redirect()->route('clients.index')->with([
            "status"=> "Success",
            "message"=> "You have successfully updated a Client and their Testimonials",
            "color"=> "success"
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        App::make('ImageDelete')->imageDelete($client->image, 'clients');

        foreach($client->testimonials as $clientTestimonial){
            $clientTestimonial->delete();
        }
        
        if($client->delete()){
            return redirect()->route('clients.index')->with([
                "status"=> "Sorry to see them go!",
                "message"=> "You have successfully removed the Client",
                "color"=> "success"
            ]);
        }else{
            return redirect()->route('clients.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the Client was not archived",
                "color"=> "danger"
            ]);
        }
    }
}
