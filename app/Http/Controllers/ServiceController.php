<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\Serviceimage;   
use App\Http\Requests\StoreService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderby('created_at','desc')->paginate(9);
        return view('admin.services.index' ,compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $logos = Serviceimage::orderBy('id','asc')->paginate(5); 
        return view('admin.services.create',compact('logos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreService $request)
    {
        $service = new Service;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->logo = $request->logo;
        if($service->save()){
        return redirect()->route('services.show',['service'=>$service->id])->with([
            "status"=> "Success",
            "message"=> "You have successfully added a service",
            "color"=> "success"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('admin.services.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $logos = Serviceimage::orderBy('id','asc')->paginate(5); 
        return view('admin.services.edit',compact('service','logos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(StoreService $request, Service $service)
    {
        $service->name = $request->name;
        $service->description = $request->description;
        $service->logo = $request->logo;
        if($service->save()){
        return redirect()->route('services.show',['service'=>$service->id])->with([
            "status"=> "Success",
            "message"=> "You have successfully updated the service",
            "color"=> "success"
            ]);
        }
        else{
            return redirect()->route('services.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the service has not been updated",
                "color"=> "danger"
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if($service->delete()){
            return redirect()->route('services.index')->with([
                "status"=> "Sorry to see them go!",
                "message"=> "You have successfully removed the service",
                "color"=> "success"
            ]);
        }else{
            return redirect()->route('services.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the service was not archived",
                "color"=> "danger"
            ]);
        }
    }
}
