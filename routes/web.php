<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\CondicionController;
use App\Http\Controllers\TiporegistroController;
use App\Http\Controllers\MinsaController;
use App\Http\Controllers\PrincipalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


/*login*/
Route::get('/',[TareaController::class,'index'])->name("index");


Route::post('import',[TareaController::class,'import'])->name("import");

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('personnel', [PersonnelController::class, 'index'])->name('personnel');
Route::post('personnel/import', [PersonnelController::class, 'import'])->name('personnelIm');


Route::get('condicion', [CondicionController::class, 'index'])->name('condicion');
Route::post('condicion/import', [CondicionController::class, 'import'])->name('condicionIm');

Route::get('tiporegistro', [TiporegistroController::class, 'index'])->name('tregistro');

Route::post('tiporegistro/import', [TiporegistroController::class, 'import'])->name('tregistroIm');


Route::get('minsa', [MinsaController::class, 'index'])->name('minsa');

Route::post('minsa/import', [MinsaController::class, 'import'])->name('minsaim');


Route::get('prin', [PrincipalController::class, 'index'])->name('prin');

Route::post('prin/import', [PrincipalController::class, 'import'])->name('prinim');