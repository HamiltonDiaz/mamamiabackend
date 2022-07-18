<?php

namespace App\Http\Controllers;

use App\Models\StateItem;
use Illuminate\Http\Request;

class StateItemController extends Controller
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
        $estate= StateItem::create([
            'descript'=>$request->input('descrip'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StateItem  $StateItem
     * @return \Illuminate\Http\Response
     */
    public function show(StateItem $StateItem)
    {
        //
    }

    /**s
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StateItem  $StateItem
     * @return \Illuminate\Http\Response
     */
    public function edit(StateItem $StateItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StateItem  $StateItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StateItem $StateItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StateItem  $StateItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(StateItem $stateItem)
    {
        //
    }
}
