<?php

namespace App\Http\Controllers;

use App\Models\SubLine;
use Illuminate\Http\Request;

class SubLineController extends Controller
{
    public function index()
    {
        $sublines= SubLine::select("id", "name", "descrip", "image")->orderBy("name","asc")->active()->get();
        return response()->json(
            $sublines,
        );
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show(SubLine $subLine)
    {
        //
    }

    public function edit(SubLine $subLine)
    {
        //
    }

    public function update(Request $request, SubLine $subLine)
    {
        //
    }

    public function destroy(SubLine $subLine)
    {
        //
    }
}
