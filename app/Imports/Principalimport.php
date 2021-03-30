<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Principal;


use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Shared\Date;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Principalimport implements ToCollection,WithHeadingRow
{

     public $count = 0;
    public function collection(Collection $rows)
    { 
    
    	$data =[];

    	 $valid = Validator::make($rows->toArray(), [
             '*.itemprin' => 'required',
         ])->validate();

        foreach ($rows as $row) 
        {

          $this->countData();

           $princ = DB::table("principals")->where("dni","=",$row["dni"])->get();
           $personnel = DB::table("personnels")->where("dni","=",$row["dni"])->value("estado");
           $minsa = DB::table("minsas")->where("numero_de_documento","=",$row["dni"])
                  ->get();


           $cond = DB::table("condicions")->where("dni","=",$row["dni"])->value("condicion_apto_no_apto");
           $treg = DB::table("tiporegistros")->where("dni","=",$row["dni"])->value("tipo_de_registro");
          
          if(count($minsa) > 0){
            $rsminsa = "SI";
          }else{
            $rsminsa = "NO";
          }
          if(count($princ) > 0){
            
          Principal::where("dni","=",$row["dni"])->update([
            "personnel"=>$personnel,
            "minsa"=>$rsminsa,
            "tipo_de_registro"=>$treg,
            "condicion_apto_no_apto"=>$cond,
          ]);
          }else{ 
           $s = [
                  "planner"=>$row["planner"],
                  "oscontrato"=>$row["oscontrato"],
                  "ruc"=>$row["ruc"],
                  "fecha_internamiento_hotel"=>$row["fecha_internamiento_hotel"],
                  "fecha_de_parada"=>$row["fecha_de_parada"],
                  "turno_de_trabajo_dia_d_noche_n"=>$row["turno_de_trabajo_dia_d_noche_n"],
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
                  "hotel_donde_esta_internado"=>$row["hotel_donde_esta_internado"],
                  "minsa"=>$rsminsa,
                  "personnel"=>$personnel,
                  "observaciones_2personnel"=>$row["observaciones_2personnel"],
                  "desc_hotel"=>$row["desc_hotel"],
                  "codhotel"=>$row["codhotel"],
                  "tipo_de_registro"=>$treg,
                  "fecha_ingreso_a_hotel"=>$row["fecha_ingreso_a_hotel_check_in"],
                  "condicion_apto_no_apto"=>$cond,
                  "fecha_de_prueba"=>$row["fecha_de_prueba"],
                  "fecha_de_viaje"=>$row["fecha_de_viaje"],
                  "hora"=>$row["hora"],
                  "comentarios"=>$row["comentarios"]
           ];
           array_push($data,$s);
          }
          
          
           
        }
        Principal::Insert($data);
    }

    public function countData(){
        return $this->count=$this->count+1;
    }




    
}
