@extends('layouts.app')

@section('content')
<main>
    <style>

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        
    </style>

    <div class="album py-5 bg-danger">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($restaurantes as $restaurante)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{$restaurante->imagen_portada}}"  width="420" height="200" alt="">
                        {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
                        <div class="card-body bg-primary">
                            <p class="card-text text-center"><strong>{{$restaurante->nombre}}</strong></p>
                            <p class="card-text">{{$restaurante->descripcion}}</p>
                            <p class="card-text">Numero de mesas:{{$restaurante->mesas}}</p>
                            <p class="card-text">Direccion:{{$restaurante->direccion}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">                                       
                                        <button> <a href="{{route('reserva.index', $restaurante)}}">RECURSO</a></button>
                                </div> 
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>
        </div>
    </div>

</main>
@endsection
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
