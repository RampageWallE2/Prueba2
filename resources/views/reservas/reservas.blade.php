@extends('layouts.app')

@section('content')

    <div class="container">
        
        <h4>Reservar en {{$restaurante->nombre}}</h4>
        <form action="{{route('reserva.insertar',$restaurante->_id)}}" method="POST">
            @csrf
            <label>
                Fecha de asistencia: <br>
                <input type="date" name="fecha_reserva"> <br>
            </label>
            <br>
            <label>
                Cantidad de personas: <br>
                <input type="integer" name="cantidad">
            </label>
            <br>
            <button type="submit"> ENVIAR RESERVA</button>
            
        </form>
    </div>
        {{$restaurante->_id}}
@endsection