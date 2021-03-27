<?php

namespace App\Imports;

use App\Models\Personnel;
use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Validation\Rule;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use  Maatwebsite\Excel\Concerns\SkipsErrors;

use Maatwebsite\Excel\Concerns\Importable;

use Maatwebsite\Excel\Concerns\WithValidation;

use PhpOffice\PhpSpreadsheet\Shared\Date;

class PersonnelImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts, WithChunkReading,WithValidation
{
use Importable;
   
   public $count = 0;

  public function rules(): array
    {
    return [
           'n_documento'=> 'required|min:7',
    ];

}
    public function customValidationMessages()
    {
    return [
            'n_documento.required'    => 'N° documento requerido',
            'n_documento.min'    => 'N° documento min 8 digitos'  
       ];
  }
    public function model(array $row)
    {
         $this->countData();
                   
                    return new Personnel([
                    "dni"=> $row["n_documento"],
                    "cia"=> $row["nombre_cia"],
                    "contrato"=> $row["n_del_contrato"],
                    "reingr"=> $row["reingr"],
                    "paterno"=> $row["ape_paterno"],
                    "materno"=> $row["ape_materno"],
                    "nombre"=> $row['nombre'],
                    "fecha_ini"=> $row['fec_ini'],
                    "fecha_fin"=> $row['fec_fin'],
                    "fecha_insc"=> $row['fec_insc'],
                    "estado"=> $row['estado'],
                    "req_pend"=> $row['requisito_pend'],
                    "cod_foto"=> $row['codfotoc'],
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

    public function uniqueBy()
    {
        return 'dni';
    }
    public function countData(){
        return $this->count=$this->count+1;
    }



        

}
