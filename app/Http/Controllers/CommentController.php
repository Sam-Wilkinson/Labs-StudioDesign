<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $comment = new Comment;
        $comment->message = $request->message;
        $comment->blogs_id = $request->blog;
        $comment->name = Auth::user()->name;
        $comment->image = Auth::user()->image;
        $comment->email = Auth::user()->email;
        if($comment->save()){
            return redirect()->route('blogs.show',['blog'=>$request->blog])->with([
                "status"=> "Success",
                "message"=> "You have successfully added a comment",
                "color"=> "success"
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->delete()){
            return redirect()->route('blogs.show',['blog'=>$comment->blogs_id])->with([
                "status"=> "Sorry to see them go!",
                "message"=> "You have successfully archived the comment",
                "color"=> "success"
            ]);
        }else{
            return redirect()->route('blogs.show',['blog'=>$comment->blogs_id])->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the comment was not archived",
                "color"=> "danger"
            ]);
        }
    }
}
