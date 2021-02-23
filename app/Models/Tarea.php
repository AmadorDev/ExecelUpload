<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
/*
    protected $fillable = [
    	'planner',
        'contrato',
        'ruc',
        'fecha_in',
        'fecha_pa',
        'turno_trabajo',
        'ap_paterno',
        'ap_materno',
     
    ];*/
    protected $guarded = [];
}
