<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTag;
use URL; 

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
        $link = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
        return view('admin.tagsCategories.tagcreate',compact('link'));
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
            if($request->link == 'blgs.show'){
                return redirect()->route('blogs.index')->with([
                    "status"=> "Success",
                    "message"=> "You have successfully added a new Tag, you can link the tag by editing the blog",
                    "color"=> "success"
                ]);
            }
            return redirect()->route($request->link)->with([
                "status"=> "Success",
                "message"=> "You have successfully added a new Tag",
                "color"=> "success"
                ]);
            }
        else{
            if($request->link == 'blogs.show'){
                return redirect()->route('blogs.index   ')->with([
                    "status"=> "Failure",
                    "message"=> "Unfortunately the new Tag did not save correctly",
                    "color"=> "danger"
                    ]);
            }
            return redirect()->route($request->link)->with([
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
