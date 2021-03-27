@extends("dashboard.base")

@section("pageTitle",'')
@section("pagenow",'Condicional')

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
        <form action="{{ route('condicionIm') }}" method="POST" enctype="multipart/form-data">
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
								<th> {{strtoupper("#")}}</th>
<th>{{strtoupper("planner")}}</th>
<th>{{strtoupper("oscontrato")}}</th>
<th>{{strtoupper("ruc")}}</th>
<th>{{strtoupper("fecha_internamiento_hotel")}}</th>
<th>{{strtoupper("fecha_de_parada")}}</th>
<th>{{strtoupper("turno_de_trabajo")}}</th>
<th>{{strtoupper("ap_paterno")}}</th>
<th>{{strtoupper("ap_materno")}}</th>
<th>{{strtoupper("first_name")}}</th>
<th>{{strtoupper("second_name")}}</th>
<th>{{strtoupper("gerencia")}}</th>
<th>{{strtoupper("superintendencia")}}</th>
<th>{{strtoupper("dni")}}</th>
<th>{{strtoupper("fecha_de_nacimiento")}}</th>
<th>{{strtoupper("posicion")}}</th>
<th>{{strtoupper("hotel_lima_huaraz")}}</th>
<th>{{strtoupper("residencia_departamento")}}</th>
<th>{{strtoupper("empresa")}}</th>
<th>{{strtoupper("telefono")}}</th>
<th>{{strtoupper("correo_electronico")}}</th>
<th>{{strtoupper("hotel")}}</th>
<th>{{strtoupper("minsa")}}</th>
<th>{{strtoupper("personnel")}}</th>
<th>{{strtoupper("desc_hotel")}}</th>
<th>{{strtoupper("codhotel")}}</th>
<th>{{strtoupper("tipo_de_registro")}}</th>
<th>{{strtoupper("condicion")}}</th>
							</tr>
						</thead>
						<tbody>
						           @foreach ($data as $key => $e)
                <tr>
 <td>{{$key + 1}}</td>                 
<td>{{$e["planner"]}}</td>
<td>{{$e["oscontrato"]}}</td>
<td>{{$e["ruc"]}}</td>
<td>{{$e["fecha_internamiento_hotel"]}}</td>

<td>{{$e["fecha_de_parada"]}}</td>
<td>{{$e["turno_de_trabajo"]}}</td>
<td>{{$e["ap_paterno"]}}</td>
<td>{{$e["ap_materno"]}}</td>
<td>{{$e["first_name"]}}</td>
<td>{{$e["second_name"]}}</td>
<td>{{$e["gerencia"]}}</td>
<td>{{$e["superintendencia"]}}</td>
<td>{{$e["dni"]}}</td>
<td>{{$e["fecha_de_nacimiento"]}}</td>
<td>{{$e["posicion"]}}</td>
<td>{{$e["hotel_lima_huaraz"]}}</td>
<td>{{$e["residencia_departamento"]}}</td>
<td>{{$e["empresa"]}}</td>
<td>{{$e["telefono"]}}</td>
<td>{{$e["correo_electronico"]}}</td>
<td>{{$e["hotel"]}}</td>
<td>{{$e["minsa"]}}</td>
<td>{{$e["personnel"]}}</td>
<td>{{$e["desc_hotel"]}}</td>
<td>{{$e["codhotel"]}}</td>
<td>{{$e["tipo_de_registro"]}}</td>
<td>{{$e["condicion_apto_no_apto"]}}</td>
                </tr>
              @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

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