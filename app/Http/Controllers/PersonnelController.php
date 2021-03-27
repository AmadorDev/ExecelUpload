<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;


use Maatwebsite\Excel\Facades\Excel;
use App\Models\Personnel;
use App\Imports\PersonnelImport;

class PersonnelController extends Controller
{
    public function index(Request $request){
    	$dt = Personnel::all()->toArray();
    	$data = array_reverse($dt);
    	return view("dashboard.personnel",compact('data'));
    }

     public function import(Request $request) 
    {
    	$file = request()->file('file');
    	$type = $file->getClientOriginalExtension();
    	if($type == 'xlsx'){
			try {
			$pim = new PersonnelImport();
			$rs = Excel::import($pim,request()->file('file')); 
			$total = $pim->countData();
			$msg = $total.' Datos procesados correctamente';

			return redirect()->back()->with('success', $msg);
			} catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
			$failures = $e->failures();
				foreach ($failures as $failure) {
					$failure->row(); 
					$failure->attribute(); 
					$failure->errors(); 
					$failure->values();
				
				}
				return redirect()->back()->with('error', $failure->errors());
			}
	      
    	}else{
    		return redirect()->back()->with('error', ["Tipo de archivo inválido"]);
    	}
    }



}
