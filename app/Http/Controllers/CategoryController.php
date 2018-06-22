<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategory;

class CategoryController extends Controller
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
        return view('admin.tagsCategories.categorycreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        $category = new Category;
        $category->name = $request->name;

        if($category->save()){
            return redirect()->route('tags.index')->with([
                "status"=> "Success",
                "message"=> "You have successfully added a new Category",
                "color"=> "success"
                ]);
            }
            else{
                return redirect()->route('tags.index')->with([
                    "status"=> "Failure",
                    "message"=> "Unfortunately the new Category did not save correctly",
                    "color"=> "danger"
                    ]);
            };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.tagsCategories.categoryBlogs',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.tagsCategories.categoryedit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategory $request, Category $category)
    {
        $category->name = $request->name;

        if($category->save()){
            return redirect()->route('tags.index')->with([
                "status"=> "Success",
                "message"=> "You have successfully added a new Category",
                "color"=> "success"
                ]);
            }
            else{
                return redirect()->route('tags.index')->with([
                    "status"=> "Failure",
                    "message"=> "Unfortunately the new Category did not save correctly",
                    "color"=> "danger"
                    ]);
            };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            return redirect()->route('tags.index')->with([
                "status"=> "Sorry to see them go!",
                "message"=> "You have successfully removed the category",
                "color"=> "success"
            ]);
        }else{
            return redirect()->route('tags.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the category was not archived",
                "color"=> "danger"
            ]);
        }
    }
}
