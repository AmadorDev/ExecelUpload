@extends("dashboard.base")

@section("pageTitle")

@endsection
@section("pagenow",'Minsa')


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
        <form action="{{ route('minsaim') }}" method="POST" enctype="multipart/form-data">
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


@livewire("personnelc")

@push("scripts")
  <script src="{{ asset('js/global.js') }}"></script>
  
<script>
    /*$(document).ready( function () {
        $('#table').DataTable({

          "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
         responsive: true
        });
   });*/
</script>
@endpush
@endsection