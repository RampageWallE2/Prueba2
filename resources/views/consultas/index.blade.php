@extends('layouts.app')

@section('content')

    <div class="container py-4">
        <h3>CONSULTAS DEL USUARIO</h3>
        <a href="{{route('consulta.insertar')}}">Realizar consultas</a>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th class="text-center" width="25">#</th>
                    <td class="text-center">Consulta</td>
                    <td class="text-center">Fecha</td>
                    <td class="text-center">Estado</td>
                    <td class="text-center">Id de empleado</td>
                    <td class="text-center">Respuesta</td>
                    <td class="text-center">Modificar</td>
                    <td class="text-center">Eliminar</td>



                </tr>
            </thead>

            <tbody >
                @foreach ($consultas as $consulta) 
                <tr>
                    <td>{{$consulta->_id}}</td>
                    <td style="">{{$consulta->consulta}}</td>
                    <td>{{$consulta->created_at}}</td>
                    <td>{{$consulta->estado}}</td>
                    <td>{{$consulta->id_empleado}}</td>
                    <td>{{$consulta->respuesta}}</td>
                    <td class="text-center">
                        <form action="{{route('consulta.mostrar.modificar',$consulta->_id)}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning">
                                MODIFICAR                                
                            </button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{route('consulta.eliminar',$consulta->_id)}}" method="POST">
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