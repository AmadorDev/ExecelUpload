<?php

namespace App\Imports;
use PhpOffice\PhpSpreadsheet\Shared\Date;



use App\Models\Tarea;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class TareaImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts,WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable;

    public function model(array $row)
    {
      \Log::debug($row);

        return new Tarea([        
            "planner"=>$row["PLANNER"] ?? null,
            "contrato"=>$row["CONTRATO"] ?? null,
            "ruc"=>$row["RUC"] ?? null,
            "fecha_in"=> \Carbon\Carbon::instance(Date::excelToDateTimeObject($row["Fecha"])),


            "fecha_pa"=>DataType::TYPE_NUMERIC($row["Fecha_de_Parada"])->format('Y-d-m'),

            "turno_trabajo"=>$row["Turno de trabajo_Día(D)_Noche(N)"] ?? null,
            "ap_paterno"=>$row["AP_PATERNO"] ?? null,
            "ap_materno"=>$row["AP_MATERNO"] ?? null,
            "first_name"=>$row["FIRST_NAME"] ?? null,
            "second_name"=>$row["SECOND_NAME"] ?? null,
            "gerencia"=>$row["GERENCIA"] ?? null,
            "superintendencia"=>$row["SUPERINTENDENCIA"] ?? null,
            "dni"=>$row["DNI"] ?? null,
            "fecha_nacimiento"=>$row["FECHA DE NACIMIENTO"] ?? null,
            "posicion"=>$row["POSICION"] ?? null,
            "hotel"=>$row["HOTEL (LIMA, HUARAZ) "] ?? null,
            "residencia"=>$row["RESIDENCIA (DEPARTAMENTO)"] ?? null,
            "empresa"=>$row["EMPRESA"] ?? null,
            "telefono"=>$row["TELÉFONO"] ?? null,
            "email"=>$row["CORREO ELECTRONICO "] ?? null,
            "minsa"=>$row["Minsa"] ?? null,
            "2personnel"=>$row["2Personnel"] ?? null,
            "desc_hotel"=>$row["Desc Hotel"] ?? null,
            "codhotel"=>$row["CodHotel"] ?? null,
            "tipo_registro"=>$row["Tipo de Registro"] ?? null,
            "condicion"=>$row["Condicion"] ?? null,
            "movilizacion_mina"=>$row["MOVILIZACION A MINA "] ?? null,
            "habitacion_confirmado"=>$row["Habitación Sólo para Check In confirmado"] ?? null,
            "direccion"=>$row["Direccion de domicilio DDJJ"] ?? null,
            "distrito"=>$row["Distrito DDJJ"] ?? null,
            "provincia"=>$row["Provincia DDJJ"] ?? null,
            "pais"=>$row["País DDJJ"] ?? null,
            "viaje"=>$row["VIAJE"] ?? null,
            "fecha_viaje"=>$row["FECHA DE VIAJE"] ?? null,
            "hora"=>$row["HORA"] ?? null,
            "comentarios"=>$row["Comentarios"] ?? null,
        ]);
               /*$dt = Tarea::where("ruc","=",$row["ruc"])->get();
               \Log::debug($dt);
               if(count($dt) == 0){
               
               $tarea = new Tarea();
               $tarea->planner = $row["planner"];
               $tarea->contrato = $row["contrato"];
               $tarea->ruc = $row["ruc"];
               $tarea->fecha_in = $row["Fecha_Internamiento_Hotel"]?? null;
               $tarea->fecha_pa = $row["Fecha_de_Parada"] ?? null;
               $tarea->turno_trabajo = $row["Turno_de_trabajo_Día(D)_Noche(N)"]?? null;
               return $tarea;
               
               }else{
               $q = Tarea::find($dt[0]["id"]);
                $q->planner = $row["planner"];
               $q->contrato = $row["contrato"];
               $q->fecha_in = $row["Fecha_Internamiento_Hotel"]?? null;
               $q->fecha_pa = $row["Fecha_de_Parada"]?? null;
               $q->turno_trabajo = $row["Turno_de_trabajo_Día(D)_Noche(N)"]?? null;
               $q->save();
               return $q;
               }*/
    }

   /* public function rules()
    {
        return [
            'registration_number' => 'regex:/[A-Z]{3}-[0-9]{3}/',
            'doors' => 'in:2,4,6',
            'years' => 'between:1998,2017'
        ];
    }*/

   public function rules(): array
{
    return [
       /* 'dni' => Rule::unique('tareas', 'dni'), // Table name, field in your db*/

        /*'dni' => function($attribute, $value, $onFailure){
            $exist = Tarea::where("dni","=",$value)->value("dni");
            \Log::debug($attribute);

        }*/
    ];
}

 public function batchSize(): int
    {
        return 100;
    }

 public function uniqueBy()
    {
        return 'ruc';
    }


}
