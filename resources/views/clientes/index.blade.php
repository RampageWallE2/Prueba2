@section('titulo', 'CLIENTES INGRESADOS')

@section('content')


    <div class="container my-3">
    <h3>CLIENTES EXISTENTES Y SUS DATOS</h3>  
    <button class="btn btn-primary"> <a class= "text-white" href="{{route('cliente.insertar')}}">INGRESAR CLIENTE NUEVO</a></button>
    <table>
        <thead>
            <tr class="text-center">
                <th>#</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>DNI</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>MODIFICAR</th>
                <th>ELIMINAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>

                    <td>                        
                        {{$cliente->_id;}}
                    </td>    
                    <td>                        
                        {{$cliente->nombre;}}
                    </td>  
                    <td>                        
                        {{$cliente->apellido;}}
                    </td>  
                    <td>                        
                        {{$cliente->dni;}}
                    </td>  
                    <td>                        
                        {{$cliente->email;}}
                    </td>  
                    <td>                        
                        {{$cliente->passwd;}}
                    </td>  
                    <td class="text-center">
                        <form action="" method="POST">
                            <button class="btn btn-warning">
                                MODIFICAR                                
                            </button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{route('cliente.eliminar',$cliente->_id)}}" method="POST">
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
