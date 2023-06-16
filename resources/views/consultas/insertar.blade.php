@extends('layouts.app')

@section('content')

<div class="container">


    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Realizar consulta</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('consulta.insertar.confirmar')}}">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">CONSULTA</label>    
                                <div class="col-md-6">
                                    <textarea name="consulta" class="form-control" cols="30" rows="2"></textarea>
                                    @error('consulta')
                                    <br>
                                    <small>*{{$message}}</small>    
                                    <br>                                                                                    
                                    @enderror
                                </div>
                            </div>
    



                            
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Realizar consulta</button>
    

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection