<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderby('id','desc')->get();
        $categories = Category::orderby('id','desc')->get();
        return view('admin.tagsCategories.index',compact('tags','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tagsCategories.tagcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTag $request)
    {
        $tag = new Tag;
        $tag->name = $request->name;

        if($tag->save()){
            return redirect()->route('tags.index')->with([
                "status"=> "Success",
                "message"=> "You have successfully added a new Tag",
                "color"=> "success"
                ]);
            }
            else{
                return redirect()->route('tags  .index')->with([
                    "status"=> "Failure",
                    "message"=> "Unfortunately the new Tag did not save correctly",
                    "color"=> "danger"
                    ]);
            };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tagsCategories.tagBlogs',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tagsCategories.tagedit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->name = $request->name;

        if($tag->save()){
            return redirect()->route('tags.index')->with([
                "status"=> "Success",
                "message"=> "You have successfully updated the tag",
                "color"=> "success"
                ]);
            }
            else{
                return redirect()->route('tags  .index')->with([
                    "status"=> "Failure",
                    "message"=> "Unfortunately the tag update was unsuccessful",
                    "color"=> "danger"
                    ]);
            };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        foreach($tag->blogs() as $blog){
            $tag->blogs()->detach($blog);
        }
        if($tag->delete()){
            return redirect()->route('tags.index')->with([
                "status"=> "Sorry to see them go!",
                "message"=> "You have successfully removed the tag",
                "color"=> "success"
            ]);
        }else{
            return redirect()->route('tags.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the tag was not archived",
                "color"=> "danger"
            ]);
        }
    }
}
