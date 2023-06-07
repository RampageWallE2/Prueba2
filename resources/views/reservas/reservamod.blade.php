@extends('layouts.app')

@section('content')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Modificar reserva en {{$restaurante->nombre}}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('reserva.actualizar',$reserva->_id)}}">
                            @csrf
                            @method('put')

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">FECHA DE ASISTENCIA</label>
    
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="fecha_reserva" value="{{$reserva->fecha_reserva}}">
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="number" class="col-md-4 col-form-label text-md-end">CANTIDAD DE ASISTENTES</label>
    
                                <div class="col-md-6">
                                    <input  type="number" class="form-control @error('password') is-invalid @enderror" name="cantidad" value="{{$reserva->cantidad}}">
                                </div>
                            </div>

    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Confirmar edicion</button>
    

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection