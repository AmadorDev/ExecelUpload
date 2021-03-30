@extends("dashboard.base")

@section("pageTitle")

@endsection
@section("pagenow",'Principal')


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
  @else
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
        <form action="{{ route('prinim') }}" method="POST" enctype="multipart/form-data">
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


 
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;" width="100%">
                        <thead>
                          <tr>

                          
<th>{{strtoupper("#")}}</th>   
 <th>{{strtoupper("planner")}}</th>                           
<th>{{strtoupper("oscontrato")}}</th>
<th>{{strtoupper("ruc")}}</th>
<th>{{strtoupper("fecha_internamiento_hotel")}}</th>
<th>{{strtoupper("fecha_de_parada")}}</th>
<th>{{strtoupper("turno_de_trabajo_dia_d_noche_n")}}</th>
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
<th>{{strtoupper("hotel_donde_esta_internado")}}</th>
<th><div class="badge badge-primary">{{strtoupper("minsa")}}</div></th>
<th><div class="badge badge-primary">{{strtoupper("personnel")}}</div></th>
<th>{{strtoupper("observaciones_2personnel")}}</th>
<th>{{strtoupper("desc_hotel")}}</th>
<th>{{strtoupper("codhotel")}}</th>
<th><div class="badge badge-primary">{{strtoupper("tipo_de_registro")}}</div></th>
<th>{{strtoupper("fecha_ingreso_a_hotel_check_in")}}</th>
<th><div class="badge badge-primary">{{strtoupper("condicion_apto_no_apto")}}</div></th>
<th>{{strtoupper("fecha_de_prueba")}}</th>
<th>{{strtoupper("fecha_de_viaje")}}</th>
<th>{{strtoupper("hora")}}</th>
<th>{{strtoupper("comentarios")}}</th>

                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


@push("scripts")
  <script src="{{ asset('js/global.js') }}"></script>
  
<script>
    $(document).ready( function () {
        $('#tableExport').DataTable({
             responsive: true,
            /* dom: 'Bfrtip',
             
             buttons: [
             'copy', 'csv', 'excel', 'pdf', 'print'
             ],*/
             "processing": true,
             "serverSide": true,
             "ajax":{
               "url": "/api/principal",
               "dataType": "json",
               "type": "POST",
               "data":{ _token: "{{csrf_token()}}"}
             },
               "columns": [
                { "data": "id" },
                { "data": "planner" },
                { "data": "oscontrato" },
                { "data": "ruc"},
                { "data": "fecha_internamiento_hotel"},
                {"data":"fecha_de_parada"},
                {"data":"turno_de_trabajo_dia_d_noche_n"},
                {"data":"ap_paterno"},
                {"data":"ap_materno"},
                {"data":"first_name"},
                {"data":"second_name"},
                {"data":"gerencia"},
                {"data":"superintendencia"},
                {"data":"dni"},
                {"data":"fecha_de_nacimiento"},
                {"data":"posicion"},
                {"data":"hotel_lima_huaraz"},
                {"data":"residencia_departamento"},
                {"data":"empresa"},
                {"data":"telefono"},
                {"data":"correo_electronico"},
                {"data":"hotel_donde_esta_internado"},
                {"data":"minsa"},
                {"data":"personnel"},
                {"data":"observaciones_2personnel"},
                {"data":"desc_hotel"},
                {"data":"codhotel"},
                {"data":"tipo_de_registro"},
                {"data":"fecha_ingreso_a_hotel_check_in"},
                {"data":"condicion_apto_no_apto"},
                {"data":"fecha_de_prueba"},
                {"data":"fecha_de_viaje"},
                {"data":"hora"},
                {"data":"comentarios"},
               
            ]

     
        
        });
   });
</script>
@endpush
@endsection