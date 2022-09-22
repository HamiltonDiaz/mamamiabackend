<?php

namespace App\Http\Controllers;

use App\Models\SubLine;
use App\Models\Line;
use Illuminate\Http\Request;

class SubLineController extends Controller
{
    public function index()
    {
        $lines=Line::select("id","name")->allitems()->get();
        $sublines= SubLine::select("sub_lines.*","ln.name as nameline","ln.id as idline")
        ->orderBy("sub_lines.name","asc")
        ->allitemsjoin()
        ->join("lines as ln", "lineid","=","ln.id")
        ->get();
        return response()->json([
            'success'=>true,
            "data"=>[$sublines,$lines],
        ],200);
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
