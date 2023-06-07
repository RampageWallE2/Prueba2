@extends('layouts.app')

@section('content')

    <div class="container py-3">

        <h3>Reservas de : {{auth()->user()->name}}</h3>

        <table class="table">
            <thead>
                <tr class="text-center table-dark">
                    <th>Id reserva</th>
                    <th>Fecha de creacion</th>
                    <th>Id restaurante</th>
                    <th>Cantidad de personas</th>
                    <th>Fecha de reserva</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr class="text-center table-danger">
                        <td>{{$reserva->_id}}</td>
                        <td >{{$reserva->created_at}}</td>
                        <td>{{$reserva->id_restaurante}}</td>
                        <td>{{$reserva->cantidad}}</td>
                        <td>{{$reserva->fecha_reserva}}</td>
                        <td class="text-center">
                            <form action="{{route('reserva.modificar',$reserva->_id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">
                                    MODIFICAR                                
                                </button>
                            </form>
                        </td>
                        <td class="text-center">
                            <form action="{{route('reserva.eliminar',$reserva ->_id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    ELIMINAR
                                </button>   
                            </form>
                         
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection