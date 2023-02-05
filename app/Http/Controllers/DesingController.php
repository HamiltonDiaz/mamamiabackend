<?php

namespace App\Http\Controllers;

use App\Models\Desing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesingController extends Controller
{

    public function index()
    {
        
        $desings = Desing::select()->orderBy("name", "asc")->allitems()->get();
        return response()->json([
            'success'=>true,
            "data"=>$desings,
        ],200);
    }


    public function desingHomeUser()
    {
        $lines = Desing::select("id", "name", "descrip", "image")->orderBy("name", "asc")->activeitems()->take(5)->get();
        return response()->json([
            'success'=>true,
            "data"=>$lines,
        ],200);
    }

    public function allDesingUser()
    {
        
        $lines = Desing::select("id", "name", "descrip", "image")->orderBy("name", "asc")->activeitems()->get();
        return response()->json([
            'success'=>true,
            "data"=>$lines,
        ],200);
    }

    public function findActive()
    {
        $desings = Desing::select("id", "name", "descrip", "image")->orderBy("name", "asc")->activeitems()->get();
        return response()->json([
            'success'=>true,
            "data"=>$desings,
        ],200);
    }


    public function findByName($name){
        $findname= Desing::where('name', $name)->exists();
        return $findname;
    }
    

    public function store(Request $request)
    {
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
        
        //dd($request->input('image'));
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/img');
            $nombreImg = $request->file('image')->hashName();
        } else {
            $alertType = "error";
            $msg = "¡Imagen no válida!";
            $notification = array(
                'message' => $msg,
                'alert-type' => $alertType
            );
            return response()->json([
                "success"=>false,
                "msg"=>$notification,
                "data"=>[],
            ]);
        }

        $descrip = "";
        if ($request->input('descrip')) {
            $descrip = $request->input('descrip');
        }

        $alertType = "success";
        $msg = "¡Creado exitosamente!\\n";

        if ($request->input('name')) {
            $desing = Desing::create([
                'name' => $request->input('name'),
                'descrip' => $descrip,
                'image' => $nombreImg,
                'stateitem' => $request->input('stateitem'),
            ]);
            $desing->save();
        } else {
            $alertType = "error";
            $msg = "¡Error al crear el registro!\\n";
            $notification = array(
                'message' => $msg,
                'alert-type' => $alertType
            );
            return response()->json([
                "success"=>false,
                "msg"=>$notification,
                "data"=>[],
            ]);
        }

        return response()->json(
            [
                "success"=>true,
                "msg"=>$msg,
                "data"=>$desing
            ]
        );
    }


    public function update(Request $request, Desing $desing)
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
        $msg = "¡Modificado exitosamente!";

        if ($request->input('name') && $active && $nombreImg) {
            Desing::whereId($request->input('id'))->update([
                'name' => $request->input('name'),
                'descrip' => $descrip,
                'image' => $nombreImg,
                'stateitem' => $active,
            ]);
        } else {
            $msg = "¡Error al modificar el registro!";
            return response()->json([
                "success"=>false,
                "msg"=>$msg,
            ]);
        }
        return response()->json([
            "success"=>true,
            "msg"=>$msg,
        ]);
    }

    public function destroy($id)
    {
        $msg = "¡Elimnado exitosamente!";
        $success = true;
        if ($id) {
            Desing::whereId($id)->update([
                'stateitem' => 3,
            ]);

        } else {
            $success = false;
            $msg = "¡Error al eliminar!";
        }

        return response()->json(
            [
                "success"=>$success,
                "msg"=>$msg,
            ]
        );
    }
}
