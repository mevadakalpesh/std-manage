<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::controller(StudentController::class)
->middleware(['auth'])
->prefix('student')
->name('student.')
->group(function (){
  Route::get('/list','index')->name('list');
  Route::post('/store','store')->name('store');
  Route::delete('/delete/{id}','delete')->name('delete');
  Route::get('/edit/{id}','edit')->name('edit');
  Route::put('/update/{id}','update')->name('update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
