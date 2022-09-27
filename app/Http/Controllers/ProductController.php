<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubLine;
use App\Models\Line;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $lines=Line::select("id","name","stateitem as linestate")->allitems()->get();
        $sublines=SubLine::select("id","name","stateitem as sublinestate")->allitems()->get();
        $products= Product::select(
            "products.*",
            "sln.name as namesubline","sln.id as idsubline",
            "ln.id as idline","ln.name as nameline")
        // ->orderBy("products.name","asc")
        ->allitemsjoin()
        ->join("sub_lines as sln", "products.sublineid","=","sln.id")
        ->join("lines as ln", "sln.lineid","=","ln.id")
        // ->toSql();
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

    private function findDuplicateItem($name,$idsln){
        $findname= Product::where([
            ["name", $name], 
            ["sublineid", $idsln]])
            ->exists();
        return $findname;
    }


    public function store(Request $request)
    {
        if($request->input('sublineid')=="" or$request->input('sublineid')==null ){
            $msg = "¡Sublinea es requerida!";
            return response()->json([
                "success"=>false,
                "msg"=>$msg,
            ]);
        }
        if($request->input('name')=="" or$request->input('name')==null ){
            $msg = "¡Nombre es requerido!";
            return response()->json([
                "success"=>false,
                "msg"=>$msg,
            ]);
        }

        if($request->input('price')=="" or$request->input('price')==null ){
            $msg = "¡Precio es requerido!";
            return response()->json([
                "success"=>false,
                "msg"=>$msg,
            ]);
        }

        //valida que no esté duplicado el registro
        if ($this->findDuplicateItem($request->input('name'),$request->input('sublineid'))) {
            $msg = "¡Ya existe un registro con este nombre!";
            return response()->json([
                "success"=>false,
                "msg"=>$msg,
            ]);
        }

        //Validar que sea una imagen
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/img');
            $nombreImg = $request->file('image')->hashName();
        } else {
            $msg = "¡Imagen no válida!";
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

        $msg = "¡Creado exitosamente!";
        
        //Se cambia el estado si la linea o la sublinea está inactiva
        $stateLine= Subline::select("ln.stateitem as stateline")
                    ->join("lines as ln", "sub_lines.lineid","=","ln.id")
                    ->where("sub_lines.id","=",$request->input('sublineid'))->first();
        $stateSubline= SubLine::select("stateitem as statesubline")->where("id","=",$request->input('sublineid'))->first();
        $endState= $request->input('stateitem');
        if ($stateLine->stateline ==2 or $stateSubline->statesubline==2){
            $msg = $msg . " ...Estado: ¡Inactivo!";
            $endState=2;
        }

        $registro = Product::create([
            'name' => $request->input('name'),
            'descrip' => $descrip,
            'image' => $nombreImg,
            'price'=>$request->input('price'),
            'stateitem' => $endState,
            'sublineid' => $request->input('sublineid'),
        ]);
        $registro->save();
        
        return response()->json(
            [
                "success"=>true,
                "msg"=>$msg,
                "data"=>$registro
            ]
        );
    }


    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy($id)
    {
        $msg = "¡Elimnado exitosamente!";
        $success = true;
        if ($id) {
            Product::whereId($id)->update([
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
