<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubLine;
use App\Models\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $lines=Line::select("id","name","stateitem as linestate")->allitems()->get();
        $sublines=SubLine::select("id","name","stateitem as sublinestate", "lineid")->allitems()->get();
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

        if($request->input('sublineid')=="" or$request->input('sublineid')==null ){
            $msg = "¡Sublinea es requerida!";
            return response()->json([
                "success"=>false,
                "msg"=>$msg,
            ]);
        }
        if($request->input('lineid')=="" or$request->input('lineid')==null ){
            $msg = "¡Línea es requerida!";
            return response()->json([
                "success"=>false,
                "msg"=>$msg,
            ]);
        }
        if($request->input('price')=="" or$request->input('price')==null ){
            $msg = "Precio es requerido!";
            return response()->json([
                "success"=>false,
                "msg"=>$msg,
            ]);
        }
        
        if($request->input('name')=="" or$request->input('name')==null ){
            $msg = "Nombre es requerido!";
            return response()->json([
                "success"=>false,
                "msg"=>$msg,
            ]);
        }

        //Valida que no exista un producto con la misma linea, sublinea o producto.
        $sublineidold=Product::select("sublineid")->where("id","=",$request->input('id'))->first();
        $lineidold=SubLine::select("lineid")->where("id","=",$sublineidold)->first();
        $nameold=Product::select("name")->where("id","=",$request->input('id'))->first();
        if ($nameold->name != $request->input('name') or 
            $sublineidold->sublineid != $request->input('sublineid') or 
            $lineidold->lineid != $request->input('lineid')) 
        {
            
            $totalProduct= Product::join("sub_lines as sl", "products.sublineid","=","sl.id")
                            ->join("lines as ln", "sl.lineid","ln.id")
                            ->where("products.name","=",$request->input('name'))
                            ->where("products.sublineid","=",$request->input('sublineid'))
                            ->where("ln.id","=",$request->input('sublineid'))
                            ->count();
            if ($totalProduct > 0) {
                //dd("ingresó");
                $msg = "¡Ya existe un registro con este nombre!";
                return response()->json([
                    "success" => false,
                    "msg" => $msg,
                ]);
            }
            // dd("no ingresó");
        }
        
        $stateLine= Line::select("stateitem", "name")->where("id","=",$request->input('lineid'))->first();        
        if ($stateLine->stateitem ==2 and $request->input('stateitem')==1){
            $msg = 'La línea "' . $stateLine->name . '" se encuentra inactiva, no es posible activar este item.';
            return response()->json([
                "success"=>false,
                "msg"=> $msg,
            ]);
        }


        $stateSubline= Subline::select("stateitem", "name")->where("id","=",$request->input('sublineid'))->first();
        if ($stateSubline->stateitem ==2 and $request->input('stateitem')==1){
            $msg = 'La Sublinea "' . $stateSubline->name . '" se encuentra inactiva, no es posible activar este item.';
            return response()->json([
                "success"=>false,
                "msg"=> $msg,
            ]);
        }
        


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

        Product::whereId($request->input('id'))->update([
            'name' => $request->input('name'),
            'descrip' => $descrip,
            'image' => $nombreImg,
            'price' => $request->input('price'),
            'stateitem' => $active,
            'sublineid' => $request->input('sublineid'),
        ]);

        return response()->json([
            "success" => true,
            "msg" => $msg,
        ]);
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
    public function singleProduct($id)    {
        $msg = "";
        $success = true;
        if ($id) {
            $product= Product::select("*")->whereId($id)->activeitems()->get()->first();
            // dd($product);
        } else {
            $success = false;
            $msg = "¡Registro no encontrado!";
        }
        return response()->json(
            [
                "success"=>$success,
                "msg"=>$msg,
                "data"=>$product
            ]
        );
    }



}
