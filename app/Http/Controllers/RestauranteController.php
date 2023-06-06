<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestauranteController1 extends Controller
{
    public function index(){
        $restaurantes = Restaurante::all();
        
        return response()->json([
            "RESULTADO"=> $restaurantes
        ]);
    }
    public function new(Request $request){
        $restaurante = new Restaurante();

        $restaurante-> nombre = $request -> nombre;
        $restaurante-> mesas = $request -> mesas;
        $restaurante-> direccion = $request -> direccion;

        $restaurante->save();

        return response()->json([
            "RESULTADO"=> $restaurante
        ]);  
   }
   
    public function update(Request $request, $id){
        $restaurante = Restaurante::findOrFail($request -> id);

        $restaurante -> nombre = $request -> nombre;
        $restaurante -> mesas = $request -> mesas;
        $restaurante -> direccion = $request -> direccion;

        $restaurante->save();

        return response()->json([
            "RESULTADO" => $restaurante
        ]);

    }
    public function destroy($id){
        Restaurante::destroy($id);
        return response()->json([
            "RESULTADO"=>"SE ELIMINO EL RESTAURANTE {$id}"
        ]);
    }
}
