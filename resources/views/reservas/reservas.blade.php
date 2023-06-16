@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">Registrar reserva en {{$restaurante->nombre}}</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{route('reserva.insertar',$restaurante->_id)}}">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">FECHA DE ASISTENCIA</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="fecha_reserva" value="{{old('fecha_reserva')}}">
                                        @error('fecha_reserva')
                                        <br>
                                        <small>*{{$message}}</small>    
                                        <br>                                                                                    
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="number" class="col-md-4 col-form-label text-md-end">CANTIDAD DE ASISTENTES</label>
        
                                    <div class="col-md-6">
                                        <input  type="number" class="form-control" name="cantidad" value="{{old('cantidad')}}">
                                        @error('cantidad')
                                            <br>
                                            <small>*{{$message}}</small>    
                                            <br>                                                                                    
                                        @enderror
                                    </div>
                                </div>
    
        
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Registrar reserva</button>
        
    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection