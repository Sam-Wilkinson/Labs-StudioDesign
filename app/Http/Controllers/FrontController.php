<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use View;
use Route;
use App\Mail\ContactFormMailer;
use App\Http\Requests\StoreNewsEmail;
use App\Http\Requests\StoreContactForm;
use App\Http\Requests\StorePublicComment;
use App\Blog;
use App\Image;
use App\Service;
use App\Text;
use App\Client;
use App\User;
use App\Product;
use App\Newsemail;
use App\Tag;
use App\Category;
use App\Testimonial;
use App\Comment;

class FrontController extends Controller
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function __construct()
    {
        // eloquent DB requests
        $contacts = Text::where('page','contact')->orderby('number','asc')->get();
        //Sharing the data with all blades
        View::share('contacts', $contacts);
    }
    public function welcome()
    {
        $carouselImage = Image::where('location','carousel')->get();
        $YTImage = Image::where('location','youtube')->first();
        $servicesCard = Service::get()->random(3);
        $clients = Client::with('testimonials')->get();
        $services = Service::get()->random(9);
        $users = User::where('roles_id','2')->take(3)->get();
        $texts = Text::where('page','home')->orderby('number','desc')->get();
        
        return view('welcome',compact('carouselImage','YTImage','servicesCard','texts','clients','services','users','contacts'));
    }

    public function services()
    {
        $services = Service::paginate(9);
        $phoneServices1 = Service::get()->random(3);
        $phoneServices2 = Service::get()->random(3);
        $products = Product::get()->random(3);

        return view('services',compact('services','phoneServices1','phoneServices2','products'));
    }

    public function blogs()
    {
        $blogs = Blog::where('validated', 1)->orderby('created_at','desc')->paginate(3);
        $tags = Tag::get();
        $categories = Category::get();
        $testimonial = Testimonial::get()->random(1)->first();

        return view('blog',compact('blogs','tags','categories','testimonial'));
    }

    public function categoryblogs(Category $category)
    {

        $blogs = Blog::where('categories_id',$category->id)->where('validated', 1 )->paginate(3);
        $tags = Tag::get();
        $categories = Category::get();
        $testimonial = Testimonial::get()->random(1)->first();

        return view('blog',compact('blogs','tags','categories','testimonial'));
    }

    public function tagblogs(Tag $tag)
    {

        $blogs = Tag::find($tag->id)->blogs()->where('tags_id', $tag->id)->where('validated', 1 )->paginate(3);
        $tags = Tag::get();
        $categories = Category::get();
        $testimonial = Testimonial::get()->random(1)->first();

        return view('blog',compact('blogs','tags','categories','testimonial'));
    }
    public function userblogs(User $user)
    {

        $blogs = Blog::where('users_id',$user->id)->where('validated', 1 )->paginate(3);
        $tags = Tag::get();
        $categories = Category::get();
        $testimonial = Testimonial::get()->random(1)->first();

        return view('blog',compact('blogs','tags','categories','testimonial'));
    }

    public function searchblogs(Request $request)
    {

        $name = $request->name;
        $blogs = Blog::where('name', 'LIKE', '%'.$name.'%')->where('validated', 1 )->paginate(3);
        $tags = Tag::get();
        $categories = Category::get();
        $testimonial = Testimonial::get()->random(1)->first();

        return view('blog',compact('blogs','tags','categories','testimonial'));
    }

    public function blogpost(Blog $blog)
    {
        $tags = Tag::get();
        $categories = Category::get();
        $testimonial = Testimonial::get()->random(1)->first();
        $comments = Comment::where('blogs_id', $blog->id)->where('validated', 1)->get();
        return view('blog-post',compact('blog','tags','categories','testimonial','comments'));
    }

    public function contact()
    {
        return view('contact');
    }
    
    public function contactform(StoreContactForm $request)
    {
        Mail::to('yassine@molengeek.com')->send(new ContactFormMailer($request));
        return redirect()->route('welcome')->with([
            "message"=> "We have received your message and will get back to you as soon as possible",
            ]);;
    }
    
    public function newsletter(Request $request)
    {
        $email = new Newsemail;
        $email->email = $request->newsemail;
        if($email->save()){
            return redirect()->route('welcome')->with([
                "message"=> "You have successfully subscribed to our newsletter",
                ]);
        }   
    }
    public function comment(StorePublicComment $request, $blog){

        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->blogs_id = $blog;
        
        if($comment->save()){
            return redirect()->route('blogpost',['blog' => $blog])->with([
                "message"=> "We have received your message and it will be displayed as soon as it can be check",
                ]);
            }
    }
}
