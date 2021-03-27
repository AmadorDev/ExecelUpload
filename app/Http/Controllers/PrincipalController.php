<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Principal;

use App\Imports\Principalimport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Redirect;

class PrincipalController extends Controller
{
    public function index (){
    	$count = Principal::count();
    	return view("dashboard.principal",compact('count'));
    }

     public function import(Request $request) 
    {
    	$file = request()->file('file');
    	$type = $file->getClientOriginalExtension();
    	if($type == 'xlsx'){
			try {
			$pim = new Principalimport();
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
				\Log::debug("algo salio mal");
				return redirect()->back()->with('error', $failure->errors());
			}
	      
    	}else{
    		return redirect()->back()->with('error', ["Tipo de archivo inválido"]);
    	}
    }


    public function listPrincipal(Request $request){
   		$columns = array( 
                            0 =>'id', 
                            1 =>'planner',
                            2=> 'oscontrato',
                            3=> 'ruc',
                            4=> 'fecha_internamiento_hotel',
							5=>'fecha_de_parada',
							6=>'turno_de_trabajo_dia_d_noche_n',
							7=>'ap_paterno',
							8=>'ap_materno',
							9=>'first_name',
							10=>'second_name',
							11=>'gerencia',
							12=>'superintendencia',
							13=>'dni',
							14=>'fecha_de_nacimiento',
							15=>'posicion',
							16=>'hotel_lima_huaraz',
							17=>'residencia_departamento',
							18=>'empresa',
							19=>'telefono',
							20=>'correo_electronico',
							21=>'hotel_donde_esta_internado',
							22=>'minsa',
							23=>'personnel',
							24=>'observaciones_2personnel',
							25=>'desc_hotel',
							26=>'codhotel',
							27=>'tipo_de_registro_check_in_no_show_cancelado',
							28=>'fecha_ingreso_a_hotel_check_in',
							29=>'condicion_apto_no_apto',
							30=>'fecha_de_prueba',
							31=>'fecha_de_viaje',
							32=>'hora',
							33=>'comentarios',
							/*34=> 'id',*/

                        );
  
        $totalData = Principal::count();

          $totalFiltered = $totalData; 
          
          $limit = $request->input('length');
          $start = $request->input('start');
          $order = $columns[$request->input('order.0.column')];
          $dir = $request->input('order.0.dir');

           if(empty($request->input('search.value'))){            
            $posts = Principal::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
         }
         else {
            $search = $request->input('search.value'); 

            $posts =  Principal::where('id','LIKE',"%{$search}%")
                            ->orWhere('planner', 'LIKE',"%{$search}%")
                            ->orWhere('ruc', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Principal::where('id','LIKE',"%{$search}%")
                             ->orWhere('ruc', 'LIKE',"%{$search}%")

                             ->count();
        }
        $data = array();
         if(!empty($posts))
        {
            foreach ($posts as $key => $post)
            {
                /*date('j M Y h:i a',strtotime());*/

                $nestedData['id'] = $key + 1;
                $nestedData['planner'] = $post->planner;
                $nestedData['oscontrato'] = $post->oscontrato;
                $nestedData['ruc'] = $post->ruc;
                $nestedData['fecha_internamiento_hotel'] = $post->fecha_internamiento_hotel;
				$nestedData['fecha_de_parada']=$post->fecha_de_parada;
				$nestedData['turno_de_trabajo_dia_d_noche_n']=$post->turno_de_trabajo_dia_d_noche_n;
				$nestedData['ap_paterno']=$post->ap_paterno;
				$nestedData['ap_materno']=$post->ap_materno;
				$nestedData['first_name']=$post->first_name;
				$nestedData['second_name']=$post->second_name;
				$nestedData['gerencia']=$post->gerencia;
				$nestedData['superintendencia']=$post->superintendencia;
				$nestedData['dni']=$post->dni;
				$nestedData['fecha_de_nacimiento']=$post->fecha_de_nacimiento;
				$nestedData['posicion']=$post->posicion;
				$nestedData['hotel_lima_huaraz']=$post->hotel_lima_huaraz;
				$nestedData['residencia_departamento']=$post->residencia_departamento;
				$nestedData['empresa']=$post->empresa;
				$nestedData['telefono']=$post->telefono;
				$nestedData['correo_electronico']=$post->correo_electronico;
				$nestedData['hotel_donde_esta_internado']=$post->hotel_donde_esta_internado;
				$nestedData['minsa']=$post->minsa;
				$nestedData['personnel']=$post->personnel;
				$nestedData['observaciones_2personnel']=$post->observaciones_2personnel;
				$nestedData['desc_hotel']=$post->desc_hotel;
				$nestedData['codhotel']=$post->codhotel;
				$nestedData['tipo_de_registro']=$post->tipo_de_registro;
				$nestedData['fecha_ingreso_a_hotel_check_in']=$post->fecha_ingreso_a_hotel_check_in;
				$nestedData['condicion_apto_no_apto']=$post->condicion_apto_no_apto;
				$nestedData['fecha_de_prueba']=$post->fecha_de_prueba;
				$nestedData['fecha_de_viaje']=$post->fecha_de_viaje;
				$nestedData['hora']=$post->hora;
				$nestedData['comentarios']=$post->comentarios;




              /*  $nestedData['options'] = '<button type="button" class="btn btn-primary" onclick="detailsC('.$post->id.')" data-toggle="modal" data-target="#exampleModalLong"><i class="flaticon-clipboard poiter"></i>
                 </button>';*/
                $data[] = $nestedData;

            }
        }

        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data);
    }
}
