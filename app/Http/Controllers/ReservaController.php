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


    public function new( Request $request, $id_restaurante){
        $id = auth()->user()->id;
        $reserva = new Reserva();
        $reserva -> id_restaurante = $id_restaurante;
        $reserva -> id_cliente = $id;
        $reserva -> cantidad = $request->cantidad;
        $reserva -> fecha_reserva = $request->fecha_reserva;

        $reserva -> save();

        return redirect('home');


    }
    public function update( Request $request, $id){

        $reserva = Reserva::findOrFail($request ->id);

        $reserva -> id_restaurante = $request->id_restaurante;
        $reserva -> id_cliente = $request -> id_cliente;
        $reserva -> cant = $request->cant;

        $reserva->save();

        return response()->json([
            "RESULTADO"=>$reserva
        ]);
    }
    public function destroy($id){
        Reserva::destroy($id);
        return redirect(route('reservas.usuario'));
        // return response()->json([
        //     "RESULTADO"=>"BORRADO"
        // ]);

    }
}
