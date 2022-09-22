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
    public function findByName($name){
        $findname= SubLine::where('name', $name)->exists();
        return $findname;
    }

    public function store(Request $request)
    {
        // dd($request);
        //valida que no esté duplicada la linea
        if ($this->findByName($request->input('name'))) {
            $alertType = "error";
            $msg = "¡Ya existe un registro con este nombre!";
            return response()->json([
                "success"=>false,
                "msg"=>$msg,
                "data"=>[],
            ]);
        }

        //Validar que sea una imagen
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/img');
            $nombreImg = $request->file('image')->hashName();
        } else {
            $alertType = "error";
            $msg = "¡Imagen no válida!\\n";
            return response()->json([
                "success"=>false,
                "msg"=>$msg,
                "data"=>[],
            ]);
        }

        $descrip = "";
        if ($request->input('descrip')) {
            $descrip = $request->input('descrip');
        }

        $msg = "¡Creado exitosamente!\\n";

        if ($request->input('name')) {
            $line = SubLine::create([
                'name' => $request->input('name'),
                'descrip' => $descrip,
                'image' => $nombreImg,
                'stateitem' => $request->input('stateitem'),
                'lineid' => $request->input('lineid'),
            ]);
            $line->save();
        } else {
            $msg = "¡Error al crear el registro!\\n";
              return response()->json([
                "success"=>false,
                "msg"=>$msg,
                "data"=>[],
            ]);
        }

        return response()->json(
            [
                "success"=>true,
                "msg"=>$msg,
                "data"=>$line
            ]
        );
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
