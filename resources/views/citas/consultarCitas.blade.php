@extends('layouts.consulta-master')
<title>Consulta de Citas</title>

@section('content')

    <h3>Consulta de Citas</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Consulta de Citas</label>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="button-group">
        <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Print</button>
        <button type="reset" class="btn btn-warning"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
        <a href="{{ url('registrarCitas') }}" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Nueva cita</a>

    </div>

    <table class="table table-striped table-hover table-borderless align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Solicitud</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $cita)
                <tr>
                    <td>{{ $cita->codcit }}</td>
                    <td>{{ $cita->codsol }}</td>
                    <td>{{ $cita->codusu }}</td>
                    <td>{{ $cita->fecha }}</td>
                    <td>{{ $cita->descrip }}</td>
                    @if($cita->estcit == 'Pendiente')
                        <td><div class="btn btn-warning">{{ $cita->estcit}}</div></td>
                    @elseif($cita->estcit == 'Completada')
                        <td><div class="btn btn-success">{{ $cita->estcit}}</div></td>
                    @endif
                   
                    <td><a href="{{ route('citas', ['id' => $cita->codcit]) }}" class="btn btn-warning btn-editar"><i class="fas fa-file-edit"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection