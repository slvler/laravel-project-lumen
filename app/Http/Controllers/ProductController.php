<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'price' => 'required',
                'desc' => 'required'
            ]
        );

        $product = new Product();

        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->desc = $request->input('desc');

        $product->save();

        return response()->json($product);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,
            [
                'title' => 'required',
                'price' => 'required',
                'desc' => 'required'
            ]
        );

        $product = Product::find($id);

        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->desc = $request->input('desc');

        $product->save();

        return response()->json($product);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json("Success");
        //
    }
}
