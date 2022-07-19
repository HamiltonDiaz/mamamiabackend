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
        $lines = Line::select("id", "name", "descrip", "image")->orderBy("name", "asc")->allitems()->get();
        return response()->json(
            $lines,
        );
    }

    public function findActive()
    {
        $lines = Line::select("id", "name", "descrip", "image")->orderBy("name", "asc")->activeitems()->get();
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

        $descrip = "";
        if ($request->input('descrip')) {
            $descrip = $request->input('descrip');
        }

        if ($request->hasFile('image')) {
            Storage::disk('publicimg')->delete($request->input('imgold'));
            $path = $request->file('image')->store('public/img');
            $nombreImg = $request->file('image')->hashName();
        } else {
            $nombreImg = $request->input('imgold');
        }

        $active = $request->input('stateitem');
        $alertType = "success";
        $msg = "Modificado exitosamente!\\n";

        if ($request->input('name') && $active && $nombreImg) {
            Line::whereId($request->input('id'))->update([
                'name' => $request->input('name'),
                'descrip' => $descrip,
                'image' => $nombreImg,
                'stateitem' => $active,
            ]);
        } else {
            $alertType = "error";
            $msg = "¡Error al modificar el registro!\\n";
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
            'alert-type' => $alertType,
        );
        return response()->json(
            $notification,
        );
    }

    public function destroy($id)
    {
        $alertType = "success";
        $msg = "Elimnado exitosamente!\\n";

        if ($id) {
            Line::whereId($id)->update([
                'stateitem' => 3,
            ]);
        } else {
            $alertType = "error";
            $msg = "¡Error al eliminar!\\n";
        }

        return response()->json(
            [
                $alertType,
                $msg,
            ]
        );
    }
}
