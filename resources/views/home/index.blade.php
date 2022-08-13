@extends('layouts.home-master')

@php
    use App\Models\citas;  
    use App\Models\solicitudes;
    use App\Models\facturas;
    use App\Models\clientes;
@endphp

@auth
@php
    $numeroCitas = citas::where('estcit', 'Pendiente')->count();
    $numeroSolicitudes = solicitudes::where('estsol', 'Pendiente')->count();
    $numeroFacturas = facturas::where('estfac', 'Pendiente')->count();
    $numeroClientes = clientes::join('tipo_clientes','tipo_clientes.codtpcli','=','clientes.codtpcli')
    ->select('tipo_clientes.tipcli')->where('tipo_clientes.tipcli', "Comprador")->count();
@endphp
@section('content')
 
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>{{ $numeroCitas }}</h3>
              <p>Citas Pendientes</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-calendar-check"></i>
            </div>
            <a href="/consultarCitas" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>{{ $numeroSolicitudes }}</h3>
              <p>Solicitudes</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-code-pull-request"></i>
            </div>
            <a href="/consultarSolicitudes" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>{{ $numeroFacturas }}</h3>
              <p>Facturas Pendientes</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-file-invoice-dollar"></i>
            </div>
            <a href="#" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>{{ $numeroClientes }}</h3>
              <p>Clientes</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-user"></i></i>
            </div>
            <a href="/consultarClientes" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="card">
        <div class="card-header">
          <label class="card-title" style="margin: 10px; font-size: 18px; font-weight: bold;">Ventas</label>
          <div class="card-tools">
            <!-- Collapse Button -->
            <button type="button" class="btn btn-primary" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="chart" style="height: 350px; width: 100%;"></div> 
          {{-- SCRIPT DEL GRAFICO --}}
          <script>
              var chart = new CanvasJS.Chart("chart", {
                  animationEnabled: true,  
                  backgroundColor: "#E3F2FD",
                  toolTip:{
                    backgroundColor: "#E3F2FD",
                    fontWeight: "bold",
                    fontFamily: "Nunito",
                    borderColor: "#1976d2",
                    cornerRadius:10
                  },
                  title:{
                    text: "Ventas mensuales - "+{{ date('Y') }}+" (USD)",
                    fontFamily: "Nunito",
                    margin: 20,
                    fontWeight: "bold",
                    fontSize: 20
                  },
                  axisX: {
                    labelFontFamily: "Nunito",
                    labelFontWeight: "bold",
                    valueFormatString: "MMM"
                  },
                  axisY: {
                    labelFontFamily: "Nunito",
                    labelFontWeight: "bold",
                    prefix: "$"
                  },
                  data: [{
                    yValueFormatString: "$#,###",
                    xValueFormatString: "MMMM",
                    type: "splineArea",
                    color: "#1976d2",
                    dataPoints: [
                      { x: new Date(2017, 0), y: 30000 },
                      { x: new Date(2017, 1), y: 27980 },
                      { x: new Date(2017, 2), y: 33800 },
                      { x: new Date(2017, 3), y: 49400 },
                      { x: new Date(2017, 4), y: 40260 },
                      { x: new Date(2017, 5), y: 33900 },
                      { x: new Date(2017, 6), y: 48000 },
                      { x: new Date(2017, 7), y: 31500 },
                      { x: new Date(2017, 8), y: 32300 },
                      { x: new Date(2017, 9), y: 42000 },
                      { x: new Date(2017, 10), y: 52160 },
                      { x: new Date(2017, 11), y: 49400 }
                    ]
                  }]
              });
              chart.render();
          </script>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    @endauth

    @guest
        <p>Para ver el contenido <a href="/login">inicia sesion</a></p>
    @endguest

@endsection