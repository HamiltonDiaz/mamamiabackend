<?php

namespace App\Http\Controllers;

use App\Models\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class LineController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $lines = Line::select("id", "name", "descrip", "image")->orderBy("name", "asc")->active()->get();
        return response()->json(
            $lines,
        );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //Validar que sea una imagen
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/img');
            $nombreImg = $request->file('image')->hashName();
        } else {
            $alertType = "error";
            $msg = "¡Imagen no válida!\\n";
            $notification = array(
                'message' => $msg,
                'alert-type' => $alertType
            );
            return response()->json(
                $notification,
            );
        }

        $descrip = "";
        if ($request->input('descrip')) {
            $descrip = $request->input('descrip');
        }

        $alertType = "success";
        $msg = "¡Creado exitosamente!\\n";

        if ($request->input('name')) {
            $line = Line::create([
                'name' => $request->input('name'),
                'descrip' => $descrip,
                'image' => $nombreImg,
                'stateitem' => $request->input('stateitem'),
            ]);
            $line->save();
        } else {
            $alertType = "error";
            $msg = "¡Error al crear el registro!\\n";
            $notification = array(
                'message' => $msg,
                'alert-type' => $alertType
            );
            return response()->json(
                $notification,
            );
        }
        $notification = array(
            'message' => $msg,
            'alert-type' => $alertType
        );
        return response()->json(
            [
                $notification,
                $line
            ]
        );
    }


    public function show(Line $line)
    {
        //
    }

    public function edit(Line $line)
    {
        //
    }


    public function update(Request $request, Line $line)
    {
        //
    }

    public function destroy(Line $line)
    {
        //
    }
}
