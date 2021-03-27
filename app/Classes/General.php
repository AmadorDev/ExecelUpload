<?php 
namespace App\Classes;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class General
{
	
	 public static function FormatDate($date){
       $rs =  \Carbon\Carbon::instance(Date::excelToDateTimeObject($date));
       $dat =  explode(" ", $rs);
       return $dat[0];
    }
}



 ?>