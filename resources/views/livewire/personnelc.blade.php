<div>
  <div class="row">
    <div class="col-12">
      <div class="card">
      <div class="card-header mt-2"> 
       <input type="text" class="form-control"  wire:model="search" 
       placeholder="Buscar" autofocus="true">
      </div>
        <div class="card-body m-2">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="table" width="100%">
              <thead>
                <tr>
                  
                  <th>{{strtoupper("#")}}</th>
                  <th>{{strtoupper("apellido_paterno")}}</th>
                  <th>{{strtoupper("apellido_materno")}}</th>
                  <th>{{strtoupper("nombres_1")}}</th>
                  <th>{{strtoupper("nombres_2")}}</th>
                  <th>{{strtoupper("regimen")}}</th>
                  <th>{{strtoupper("especificacion_otro_regimen")}}</th>
                  <th>{{strtoupper("tipo_contratacion")}}</th>
                  <th>{{strtoupper("ruc_contrata")}}</th>
                  <th>{{strtoupper("tipo_documento")}}</th>
                  <th>{{strtoupper("numero_de_documento")}}</th>
                  <th>{{strtoupper("correo")}}</th>
                  <th>{{strtoupper("telefono")}}</th>
                  <th>{{strtoupper("modalidad_de_trabajo_presencial_teletrabajo_trabajo_remoto")}}</th>
                  <th>{{strtoupper("factor_de_riesgo_comorbilidad")}}</th>
                  <th>{{strtoupper("puesto_de_trabajo")}}</th>
                  <th>{{strtoupper("muy_alto")}}</th>
                  <th>{{strtoupper("alto")}}</th>
                  <th>{{strtoupper("medio")}}</th>
                  <th>{{strtoupper("bajo")}}</th>
                  <th>{{strtoupper("reinicio_de_actividades_regreso_reincorporacion")}}</th>
                  <th>{{strtoupper("fecha_de_reinicio_de_actividades")}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key=> $e)
                <tr class="poiter">
                  <td>{{$key +1}}</td>
                  <td>{{$e["apellido_paterno"]}}</td>
                  <td>{{$e["apellido_materno"]}}</td>
                  <td>{{$e["nombres_1"]}}</td>
                  <td>{{$e["nombres_2"]}}</td>
                  <td>{{$e["regimen"]}}</td>
                  <td>{{$e["especificacion_otro_regimen"]}}</td>
                  <td>{{$e["tipo_contratacion"]}}</td>
                  <td>{{$e["ruc_contrata"]}}</td>
                  <td>{{$e["tipo_documento"]}}</td>
                  <td>{{$e["numero_de_documento"]}}</td>
                  <td>{{$e["correo"]}}</td>
                  <td>{{$e["telefono"]}}</td>
                  <td>{{$e["modalidad_de_trabajo"]}}</td>
                  <td>{{$e["factor_de_riesgo_comorbilidad"]}}</td>
                  <td>{{$e["puesto_de_trabajo"]}}</td>
                  <td>{{$e["muy_alto"]}}</td>
                  <td>{{$e["alto"]}}</td>
                  <td>{{$e["medio"]}}</td>
                  <td>{{$e["bajo"]}}</td>
                  <td>{{$e["reinicio_de_actividades"]}}</td>
                  <td>{{$e["fecha_de_reinicio"]}}</td>
                </tr>
                @endforeach
              </tbody>
              <thead>
                <tr>
                  <th>{{strtoupper("#")}}</th>
                  <th>{{strtoupper("apellido_paterno")}}</th>
                  <th>{{strtoupper("apellido_materno")}}</th>
                  <th>{{strtoupper("nombres_1")}}</th>
                  <th>{{strtoupper("nombres_2")}}</th>
                  <th>{{strtoupper("regimen")}}</th>
                  <th>{{strtoupper("especificacion_otro_regimen")}}</th>
                  <th>{{strtoupper("tipo_contratacion")}}</th>
                  <th>{{strtoupper("ruc_contrata")}}</th>
                  <th>{{strtoupper("tipo_documento")}}</th>
                  <th>{{strtoupper("numero_de_documento")}}</th>
                  <th>{{strtoupper("correo")}}</th>
                  <th>{{strtoupper("telefono")}}</th>
                  <th>{{strtoupper("modalidad_de_trabajo_presencial_teletrabajo_trabajo_remoto")}}</th>
                  <th>{{strtoupper("factor_de_riesgo_comorbilidad")}}</th>
                  <th>{{strtoupper("puesto_de_trabajo")}}</th>
                  <th>{{strtoupper("muy_alto")}}</th>
                  <th>{{strtoupper("alto")}}</th>
                  <th>{{strtoupper("medio")}}</th>
                  <th>{{strtoupper("bajo")}}</th>
                  <th>{{strtoupper("reinicio_de_actividades_regreso_reincorporacion")}}</th>
                  <th>{{strtoupper("fecha_de_reinicio_de_actividades")}}</th>
                </tr>
              </thead>
            </table>
         <div class="d-block d-md-none">
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              {{ $data->links() }}
            </nav>
            
        </div>
        </div>
        </div>
        </div>
        <div class="d-none d-md-block">
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              {{ $data->links() }}
            </nav>
            
        </div>
        </div>
      </div>
    </div>
  </div>
</div>