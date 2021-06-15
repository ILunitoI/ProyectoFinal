<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\OperatorController;
use App\Http\Controllers\dashboard\MedicController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');



/*Route::get('/home', function () {
    return "Hola Mundo";
});*/
/*
//Ruta con vista y envío de parámetros
Route::get('home', function() {
    return view('home') ->with('firstname', 'Eduardo')->with('lasstname', 'Zavala');
})->name('home');

*/

Route::resource('dashboard/admin', AdminController::class);

Route::resource('dashboard/operator', OperatorController::class);

Route::resource('dashboard/medic', MedicController::class);


//Route::post('post', [PostController::class,'store'])->name('post.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');