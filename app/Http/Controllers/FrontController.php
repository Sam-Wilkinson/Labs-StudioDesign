<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Route;
use App\Image;
use App\Service;
use App\Text;
use App\Client;
use App\User;

class FrontController extends Controller
{
    public function welcome()
    {
        $carouselImage = Image::where('location','carousel')->get();
        $YTImage = Image::where('location','youtube')->get();
        $servicesCard = Service::get()->random(3);
        $texts = Text::orderby('id','desc')->get();
        $clients = Client::with('testimonials')->get();
        $services = Service::get()->random(9);
        $users = User::where('roles_id','2')->take(3)->get();
        return view('welcome',compact('carouselImage','YTImage','servicesCard','texts','clients','services','users'));
    }

    public function services()
    {
        return view('services');
    }

    public function blogs()
    {
        return view('blog');
    }

    public function blogpost(Blog $blog)
    {
        return view('blog-post',compact('blog'));
    }

    public function contact()
    {
        return view('contact');
    }
}
