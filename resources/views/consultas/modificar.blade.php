@extends('layouts.app')

@section('content')


    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card bg-dark text-white">
                    <div class="card-header">Modificar consulta</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('consulta.actualizar',$consulta->_id)}}">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">FECHA DE ASISTENCIA</label>
    
                                <div class="col-md-6">
                                    <textarea name="consulta" cols="30" rows="5">{{$consulta->consulta}}</textarea>
                                </div>
                                @error('consulta')
                                    <br>
                                    <small>*{{$message}}</small>
                                    <br>
                                @enderror
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