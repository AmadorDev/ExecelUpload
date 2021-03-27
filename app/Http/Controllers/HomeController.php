<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $per = DB::table("personnels")->count();
        $con = DB::table("condicions")->count();
        $min=DB::table("minsas")->count();
        $treg=DB::table("tiporegistros")->count();
        $prin=DB::table("principals")->count();

        $total = intval($per) + intval($con)+ intval($min)+ intval($treg)+ intval($prin);

       


        return view('dashboard.home',compact("per","con","min","treg","prin","total"));
    }
}
