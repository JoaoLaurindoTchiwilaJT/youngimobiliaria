<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imobController;
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

Route::get('/', imobController::class);

Route::get('/login', function (){
    return view('login');
})->name('login'); 

Route::post('/login', [imobController::class, 'login'])->name('login.post');

Route::get('/admin', [imobController::class, 'admin'])->name('admin');


Route::post('/admin',[imobController::class,'createService'])->name('createService.post');

Route::delete('/servicos/{id}', [imobController::class, 'destroy'])->name('servicos.destroy');

Route::post('/logout', [imobController::class, 'logout'])->name('logout');