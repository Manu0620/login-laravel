@extends('layouts.consulta-master')

<title>Consulta de Usuarios</title>

@php
    $rol = auth()->user()->rol;
    use App\Models\empleados;
@endphp

@section('content')
    @if($rol == 'Administrador')
    
    <div class="tab-nav">
        <a href="/home">Home</a>
        <label>/</label> 
        <a href="/consultarUsuarios"> Consulta de Usuarios</a>
    </div>
    
    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="row">
        <div class="col">
            <h3>Consulta de Usuarios</h3>
        </div>
        <div class="col">
            <div class="button-group">  
                <div class="buttons" id="buttons" style="text-align: right;"></div>
            </div>
        </div>

        <div class="col-2">
            <div class="button-group" style="text-align: right;">  
                {{-- <button id="imprimir" class="btn btn-primary shadow-none" style="background: #1E88E5;"><i class="fas fa-file-pdf"></i> Impirmir</button> --}}
                <button type="reset" class="btn btn-primary shadow-none" style="background: #1976D2;"><i class="fa-solid fa-arrow-rotate-left"></i> Limpiar</button>
                <a href="{{ url('registrarClientes') }}" type="button" class="btn btn-primary shadow-none" style="background: #208b3a;"><i class="fa-solid fa-circle-plus"></i> Nuevo Cliente</a>
            </div>
        </div>
    </div>

    <table id="dataTable" class="table table-striped table-hover text-align-center table-borderless align-middle">
        <thead>
            <tr>
                <th scope="row">ID</th>
                <th>Empleado</th>
                <th>Nombre de Usuario</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    @php $empleados = empleados::where('codemp',$usuario->codemp)->first() @endphp
                    <td>{{ $empleados->codemp. ' - ' .$empleados->nomemp. '  ' .$empleados->apeemp }}</td>
                    <td>{{ $usuario->username }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->rol }}</td>  
                    @if($usuario->status == 'inactivo')
                        <td><li class="btn btn-warning">{{ $usuario->status}}</li></td>
                    @elseif($usuario->status == 'activo')
                        <td><li class="btn btn-success">{{ $usuario->status}}</li></td>
                    @endif
                    
                    <td><a href="{{ route('usuarios', ['id' => $usuario->id]) }}" class="btn btn-danger btn-editar"><i class="fas fa-ban"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
         $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        title: ' ',
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '11px' )
                                .prepend(
                                    '<img src="assets/img/Solo logo.png" style="position:absolute; top:10; left:10; opacity:0.6; " />'
                                );
        
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fa-solid fa-file-excel"></i> Excel',
                        title: 'Reporte de Usuarios',
                    } 
                ]
            });

            table.buttons().container()
            .appendTo("#buttons");

            document.querySelectorAll('#imprimir').forEach(function(element) {
                element.addEventListener('click', function() {
                    print();
                });
            });
        });
    </script>

    @else
        <h3>No puede acceder a esta pagina, retornar a <a href="/home">Home</a></h3>
    @endif
@endsection