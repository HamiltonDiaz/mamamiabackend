<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubLine;
use App\Models\Line;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lines=Line::select("id","name","stateitem as linestate")->allitems()->get();
        $sublines=SubLine::select("id","name","stateitem as sublinestate")->allitems()->get();
        $products= Product::select("products.*","sln.name as namesubline","ln.id as idsline","ln.name as nameline")
        // ->orderBy("products.name","asc")
        ->allitemsjoin()
        ->join("sub_lines as sln", "sublineid","=","sln.id")
        ->join("lines as ln", "sln.id","=","ln.id")
        ->get();
        return response()->json([
            'success'=>true,
            "data"=>["lines"=>$lines,"sublines"=>$sublines,"products"=>$products],
        ],200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
