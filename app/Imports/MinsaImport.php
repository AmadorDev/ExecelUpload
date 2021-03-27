<?php

namespace App\Imports;

use App\Models\Minsa;
use Maatwebsite\Excel\Concerns\ToModel;


use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class MinsaImport implements ToModel,WithHeadingRow,WithBatchInserts, WithUpserts, WithChunkReading,WithValidation
{
	use Importable;
    public $count = 0;

    public function rules(): array{
        return [
			'tipo_documento'      => 'required',
			'numero_de_documento' => 'required',
           
           
        ];

    }
    public function customValidationMessages(){
            return [
            'ruc_contrata.required'    => 'ruc_contrata requerido', 
            ];
    }
   

    public function __construct()
{
    set_time_limit(300000);
}
   
    public function model(array $row)
    {
    	$this->countData();
    	
        return new Minsa([
"apellido_paterno"=>$row["apellido_paterno"] ?? null,
"apellido_materno"=>$row["apellido_materno"] ?? null,
"nombres_1"=>$row["nombres_1"] ?? null,
"nombres_2"=>$row["nombres_2"] ?? null,
"regimen"=>$row["regimen"] ?? null,
"especificacion_otro_regimen"=>$row["especificacion_otro_regimen"] ?? null,
"tipo_contratacion"=>$row["tipo_contratacion"] ?? null,
"ruc_contrata"=>$row["ruc_contrata"] ?? null,
"tipo_documento"=>$row["tipo_documento"] ?? null,
"numero_de_documento"=>$row["numero_de_documento"] ?? null,
"correo"=>$row["correo"] ?? null,
"telefono"=>$row["telefono"] ?? null,
"modalidad_de_trabajo"=>$row["modalidad_de_trabajo_presencial_teletrabajo_trabajo_remoto"] ?? null,
"factor_de_riesgo_comorbilidad"=>$row["factor_de_riesgo_comorbilidad"] ?? null,
"puesto_de_trabajo"=>$row["puesto_de_trabajo"] ?? null,
"muy_alto"=>$row["muy_alto"] ?? null,
"alto"=>$row["alto"] ?? null,
"medio"=>$row["medio"] ?? null,
"bajo"=>$row["bajo"] ?? null,
"reinicio_de_actividades"=>$row["reinicio_de_actividades_regreso_reincorporacion"] ?? null,
"fecha_de_reinicio"=>$row["fecha_de_reinicio_de_actividades"] ?? null
            
        ]);
       
    }

    public function batchSize(): int
    {
        return 1000;
    }
     public function chunkSize(): int
    {
        return 1000;
    }

    public function countData(){
        return $this->count=$this->count+1;
    }
    public function uniqueBy()
    {
        return 'numero_de_documento';
    }
}
