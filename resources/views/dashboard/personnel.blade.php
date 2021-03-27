@extends("dashboard.base")

@section("pageTitle")

@endsection
@section("pagenow",'2Personnel')


@push("styles")
<link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endpush

@section("content")
@if (\Session::has('success'))
    
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      <strong>{!! \Session::get('success') !!}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
@endif
@if (\Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <ul class="list-inline">
    @foreach (Session::get('error') as $e)
    <li>{!! $e !!}</li>
    @endforeach
  </ul>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
        <form action="{{ route('personnelIm') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               <div class="row">
                 <div class="col-12 col-md-10">
                    <input type="file" name="file" id="file" class="form-control" required accept=".xlsx, .xls, .csv">
                 </div>
                 <div class="col-12 col-md-2 mt-2  mt-md-0 ">
                    <button class="btn btn-outline-secondary btn-block" id="btnProcesar" onclick="cargar(this)" type="submit">PROCESAR</button>
                 </div>
               </div> 
            </form>
			</div>
		</div>
	</div>
</div>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-hover" id="table" width="100%">
            <thead>
              <tr>
              <th class="text-center">#</th>
              <th>CIA</th>
              <th>N° DEL CONTRATO</th>
              <th>DNI</th>
              <th>REINGR</th>
              <th>APE/PATERNO</th>
              <th>APE/MATERNO</th>
              <th>NOMBRE</th>
              <th>FECIN</th>
              <th>FECFIN</th>
              <th>FECINSC</th>
              <th>ESTADO</th>
              <th>REQUISITO PEND</th>
              <th>CODFOTOC</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $key => $e)
              <tr>
                 <td>{{$key +1}}</td>
                          <td>{{$e['cia']}}</td>
                          <td>{{$e['contrato']}}</td>
                          <td>{{$e['dni']}}</td>
                          <td>{{$e['reingr']}}</td>
                          <td>{{$e['paterno']}}</td>
                          <td>{{$e['materno']}}</td>
                          <td>{{$e['nombre']}}</td>
                          <td>{{$e['fecha_ini']}}</td>
                          <td>{{$e['fecha_fin']}}</td>
                          <td>{{$e['fecha_insc']}}</td>
                          <td>
                            @if ($e['estado'] == 'APROBADO')
                              <div class="badge badge-success">{{$e['estado']}}</div>
                              @elseif($e['estado'] == 'PENDIENTE')
                              <div class="badge badge-danger">{{$e['estado']}}</div>
                              @else
                              <div class="badge badge-warning">{{$e['estado']}}</div>
                            @endif
                          </td>
                          <td>{{$e['req_pend']}}</td>
                          <td>{{$e['cod_foto']}}</td>
                          
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


@push("scripts")
  <script src="{{ asset('js/global.js') }}"></script>
    <script>
    $(document).ready( function () {
        $('#table').DataTable({
          "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
         responsive: true
        });
   });
  </script> 
@endpush
@endsection