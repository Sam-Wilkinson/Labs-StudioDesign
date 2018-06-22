<?php

namespace App\Http\Controllers;

use App;
use App\Blog;
use App\User;
use App\Tag;
use App\Category;
use Auth;
use Storage;
use App\Http\Requests\StoreBlog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('user','comments')->orderBy('id','desc')->paginate(5);
        return view('user.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::get();
        $categories = Category::get();
        return view('user.blogs.create', compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlog $request)
    {
        $blog = new Blog;
        $blog->name = $request->name;
        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->image = $request->image;
        $blog->categories_id= $request->category;
        $blog->users_id = Auth::user()->id;
        if($request->image != null){
            $blog->image = App::make('ImageResize')->imageStore($request->image, 'blogs', 720 , null);
        }
        $blog->save();
        foreach($request->tags as $tag)
        {
           $blog->tags()->attach($tag);
        }
        return redirect()->route('blogs.show',['blog'=>$blog->id])->with([
            "status"=> "Success",
            "message"=> "You have successfully added a Blog",
            "color"=> "success"
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        
        $commentsNum = count($blog->comments);
        if($blog->user == null){
            $users = User::onlyTrashed()->where('id',$blog->users_id)->get();
            return view('user.blogs.show',compact('blog','commentsNum','users'));
        };
        return view('user.blogs.show',compact('blog','commentsNum'));
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $tags = Tag::get();
        $categories = Category::get();
        return view('user.blogs.edit', compact('blog','tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlog $request, Blog $blog)
    {
        $blog->name = $request->name;
        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->categories_id= $request->category;
        $blog->users_id = Auth::user()->id;
        if($request->image != null){
            if(Storage::disk('blogs')->exists($blog->image)){
                App::make('ImageResize')->imageDelete($blog->image, 'blogs');
            }
            $blog->image = App::make('ImageResize')->imageStore($request->image, 'blogs', 720 , null);
        }
        $blog->save();
        if($blog->tags != $request->tags)
        {
            $blog->tags()->detach();
            foreach($request->tags as $tag)
            {
                $blog->tags()->attach($tag);
            }
        }
        return redirect()->route('blogs.show',['blog'=>$blog->id])->with([
            "status"=> "Success",
            "message"=> "You have successfully added a Blog",
            "color"=> "success"
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        App::make('ImageDelete')->imageDelete($blog->image, 'blogs');
        foreach($blog->comments() as $comment){
            $comment->delete();
        }
        if($blog->delete()){
            return redirect()->route('blogs.index')->with([
                "status"=> "Sorry to see them go!",
                "message"=> "You have successfully removed the blog",
                "color"=> "success"
            ]);
        }else{
            return redirect()->route('users.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the blog was not archived",
                "color"=> "danger"
            ]);
        }
    }
}
