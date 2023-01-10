<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Models\SubLine;
use App\Models\Product;
use GrahamCampbell\ResultType\Success;
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
        //https://www.latirus.com/blog/2020/11/01/storage-link-en-hosting-compartido-laravel-symlink/
        $lines = Line::select()->orderBy("name", "asc")->allitems()->get();
        return response()->json([
            'success'=>true,
            "data"=>$lines,
        ],200);
    }

    public function findActive()
    {
        $lines = Line::select("id", "name", "descrip", "image")->orderBy("name", "asc")->activeitems()->get();
        return response()->json([
            'success'=>true,
            "data"=>$lines,
        ],200);
    }

    public function lineHomeUser()
    {
        $lines = Line::select("id", "name", "descrip", "image")->orderBy("name", "asc")->activeitems()->take(5)->get();
        return response()->json([
            'success'=>true,
            "data"=>$lines,
        ],200);
    }

    public function findByName($name){
        $findname= Line::where('name', $name)->exists();
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
        // dd($request->input('image'));
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
                "data"=>$line
            ]
        );
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
        $msg = "¡Modificado exitosamente!";

        if ($request->input('name') && $active && $nombreImg) {
            Line::whereId($request->input('id'))->update([
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
            Line::whereId($id)->update([
                'stateitem' => 3,
            ]);

            SubLine::where("lineid","=",$id)->update([
                'stateitem' => 3,
            ]);

            Product::join("sub_lines as sln", "products.sublineid","=","sln.id")
            ->join("lines as ln", "sln.lineid","=", "ln.id")
            ->where("sln.lineid","=",$id)->update([
                'products.stateitem' => 3,
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
