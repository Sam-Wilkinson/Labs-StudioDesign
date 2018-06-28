<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;

class ValidationController extends Controller
{
    public function all()
    {
        $blogs = Blog::where('validated',null)->orderby('created_at','desc')->get();
        $comments = Comment::where('validated',null)->orderby('created_at','desc')->get();
        return view('admin.validations.all',compact('blogs','comments'));
    }
    public function blogs()
    {
        $blogs = Blog::where('validated',null)->orderby('created_at','desc')->get();
        return view('admin.validations.blogs',compact('blogs','comments'));
    }
    public function comments()
    {
        $comments = Comment::where('validated',null)->orderby('created_at','desc')->get();
        return view('admin.validations.comments',compact('blogs','comments'));
    }
    public function blogvalidation(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->get();
        $status = $request->validation;
        $blog[0]->validated = boolval($status);
        if($blog[0]->save()){
            return redirect()->route('valAll')->with([
            "status"=> "Success",
            "message"=> "You have validated the blog",
            "color"=> "success"
            ]);
        }
        else{
            return redirect()->route('valAll')->with([
            "status"=> "Failure",
            "message"=> "Unfortunately the blog did not validate",
            "color"=> "danger"
            ]);
        }
    }
    public function commentvalidation(Request $request, $id)
    {
        $comment = Comment::where('id', $id)->get();
        $status = $request->validation;
        $comment[0]->validated = boolval($status);
        if($comment[0]->save()){
            return redirect()->route('valAll')->with([
            "status"=> "Success",
            "message"=> "You have validated the comment",
            "color"=> "success"
            ]);
        }
        else{
            return redirect()->route('valAll')->with([
            "status"=> "Failure",
            "message"=> "Unfortunately the comment did not validate",
            "color"=> "danger"
            ]);
        }
    }
    
}
