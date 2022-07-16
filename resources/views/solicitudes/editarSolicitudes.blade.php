@extends('layouts.formulario-master')
<title>Registro de Solicitudes</title>

@section('content')
    
    <h3>Solicitudes</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Formulario de Solicitudes</label>
    </div>

    <form action="{{ route('solicitudes', ['id' => $solicitud->codsol]) }}" method="POST">
        @csrf

        @method('PUT')

        @if (Session::get('success', false))
        @include('layouts.partials.messages')
          @endif
        
        <div class="mb-3">
            <label for="codcli">Cliente</label>
            <input type="text" class="form-control" name="codcli" value="{{ $solicitud->codcli }}">
            @error('codcli')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="codpro">Propiedad</label>
            <input type="text" class="form-control" name="codpro" value="{{ $solicitud->codpro }}">
            @error('codpro')
            @include('layouts.partials.messages')
        @enderror
            
        </div>

        <div class="mb-3">
            <label for="comentario">Comentario</label>
            <textarea type="text" class="form-control" rows="4" cols="50" name="comentario" placeholder="Escriba su comentario..." value="{{ $solicitud->comentario }}"> </textarea>
            @error('comentario')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" name="fecha" placeholder="Ingrese el fecha..." value="{{ $solicitud->fecha }}">
            @error('fecha')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="estsol">Estado</label>
            <select class="form-select" name="estsol">
                <option value="pendiente" selected>Pendiente</option>
                <option value="en proceso">En proceso</option>
                <option value="procesada">Procesada</option>
            </select>
        </div>

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>

@endsection