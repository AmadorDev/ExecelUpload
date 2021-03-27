<?php

namespace App\Imports;

use App\Models\Tiporegistro;
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


class TregistroImport implements ToModel,WithHeadingRow,WithBatchInserts, WithUpserts, WithChunkReading,WithValidation
{
    use Importable;
    public $count = 0;

    public function rules(): array{
        return [
           'dni'=> 'required|min:7',
        ];

    }
    public function customValidationMessages(){
            return [
            'dni.required'    => 'N° documento requerido',
            'dni.min'    => 'N° documento min 8 digitos'  
            ];
    }
   
   
    public function model(array $row)
    {
     	$this->countData();
        return new Tiporegistro([   
		"planner"=>$row["planner"],
		"oscontrato"=>$row["oscontrato"],
		"ruc"=>$row["ruc"],
		"fecha_internamiento_hotel"=>$row["fecha_internamiento_hotel"],
		"fecha_de_parada"=>$row["fecha_de_parada"],
		"turno_de_trabajo"=>$row["turno_de_trabajo_dia_d_noche_n"],
		"ap_paterno"=>$row["ap_paterno"],
		"ap_materno"=>$row["ap_materno"],
		"first_name"=>$row["first_name"],
		"second_name"=>$row["second_name"],
		"gerencia"=>$row["gerencia"],
		"superintendencia"=>$row["superintendencia"],
		"dni"=>$row["dni"],
		"fecha_de_nacimiento"=>$row["fecha_de_nacimiento"],
		"posicion"=>$row["posicion"],
		"hotel_lima_huaraz"=>$row["hotel_lima_huaraz"],
		"residencia_departamento"=>$row["residencia_departamento"],
		"empresa"=>$row["empresa"],
		"telefono"=>$row["telefono"],
		"correo_electronico"=>$row["correo_electronico"],
		"hotel"=>$row["hotel"],
		"minsa"=>$row["minsa"],
		"personnel"=>$row["2personnel"],
		"desc_hotel"=>$row["desc_hotel"],
		"codhotel"=>$row["codhotel"],
		"tipo_de_registro"=>$row["tipo_de_registro_check_in_no_show_cancelado"],


        ]);
    }

        public function batchSize(): int
    {
        return 100;
    }
     public function chunkSize(): int
    {
        return 100;
    }

    public function uniqueBy()
    {
        return 'dni';
    }
    public function countData(){
        return $this->count=$this->count+1;
    }
}
