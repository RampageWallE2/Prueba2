<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index(){
        $id_usuario = auth()->user()->id;

        $consultas = Consulta::where('id_usuario',$id_usuario)->get();

        return view('/consultas/index', compact('consultas'));
        
    }
    public function indexinsert(){
        return view('/consultas/insertar');
    }
    public function new(Request $request){
        $request->validate([
            'consulta'=>'required'
        ]);

        $consulta = new Consulta();
        $consulta->consulta=$request->consulta;
        $consulta->id_usuario=auth()->user()->id;
        $consulta->estado = 'Sin respuesta  ';
        $consulta->save();
        
        return redirect(route('consultas.index'));
    }
    public function destroy($id){        
        Consulta::destroy($id);
        return redirect(route('consultas.index'));
    }
    public function showToUpdate($id){
        $consulta = Consulta::where('_id', $id)->first();
        return view('/consultas/modificar', compact('consulta'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'consulta'=>'required'
        ]);

        $consulta = Consulta::where('_id', $id)->first();
        $consulta -> consulta = $request -> consulta;
        $consulta -> save();
        return redirect(route('consultas.index'));
    }
}
