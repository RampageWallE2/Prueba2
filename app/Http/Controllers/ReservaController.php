<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use App\Models\Reserva;
// use App\Models\Restaurante;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;



class ReservaController extends Controller
{
    public function index($request){


        $restaurante = Restaurante::find($request);       
        
        return view('/reservas/reservas', compact('restaurante'));
    }
    public function index2(){
        $reservas = Reserva::where('id_cliente', auth()->user()->id)->get();

        return view('/reservas/reservasuser', compact('reservas'));

    }
    public function showmod($id_reserva){
        $reserva = Reserva::find($id_reserva);  
        $id_restaurante = $reserva->id_restaurante;
        $restaurante = Restaurante::find($id_restaurante);  
        return view ('/reservas/reservamod',compact('reserva','restaurante'));
    }


    public function new( Request $request, $id_restaurante){

        $request->validate([
            'fecha_reserva' => 'required',
            'cantidad'=> 'required'

        ]); 


        $id = auth()->user()->id;
        $reserva = new Reserva();
        $reserva -> id_restaurante = $id_restaurante;
        $reserva -> id_cliente = $id;
        $reserva -> cantidad = $request->cantidad;
        $reserva -> fecha_reserva = $request->fecha_reserva;

        $reserva -> save();

        return redirect('home');
    }
    
    public function update( Request $request, $id_reserva){

        $reserva = Reserva::findOrFail($id_reserva);
        $reserva -> fecha_reserva = $request->fecha_reserva;
        $reserva -> cantidad = $request->cantidad;
        $reserva->save();
        return redirect(route('reservas.usuario'));
    }

    public function destroy($id){
        Reserva::destroy($id);
        return redirect(route('reservas.usuario'));
        // return response()->json([
        //     "RESULTADO"=>"BORRADO"
        // ]);

    }
}
