<?php

namespace App\Http\Controllers;

use App;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $products = Product::orderby('id', 'desc')->get();
         return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = App::make('ImageResize')->imageStore($request->image, 'products', 360 , 260);

        if($product->save()){
            return redirect()->route('products.index')->with([
                "status"=> "Success",
                "message"=> "You have successfully created a product",
                "color"=> "success"
                ]);
        }
        else{
            return redirect()->route('products.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the product did not save.",
                "color"=> "danger"
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, Product $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        if($request->image != null){
            App::make('ImageDelete')->ImageDelete($product->image,'products');
            $product->image = App::make('ImageResize')->imageStore($request->image, 'products', 360 , 260);
        }

        if($product->save()){
            return redirect()->route('products.index')->with([
                "status"=> "Success",
                "message"=> "You have successfully created a product",
                "color"=> "success"
                ]);
        }
        else{
            return redirect()->route('products.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the product did not save.",
                "color"=> "danger"
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        App::make('ImageDelete')->ImageDelete($product->image,'products');
        if($product->delete()){
            return redirect()->route('products.index')->with([
                "status"=> "Success",
                "message"=> "You have successfully deleted a product",
                "color"=> "success"
                ]);
        }
        else{
            return redirect()->route('products.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the product did not delete",
                "color"=> "danger"
                ]);
        }
    }
}
