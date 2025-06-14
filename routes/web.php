<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layouts.template');
// });
Route::get('/',function(){
    return view('home.index');
})->middleware('auth')->name('home');

Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'proses'])->name('login.proses');
Route::get('keluar',[LoginController::class,'keluar'])->name('login.keluar');


Route::get('/map-cctv', function () {
    return view('layouts.template');
})->middleware('auth')->name('map');

Route::get('/users',function(){
    return view('users.index');
})->middleware('auth')->name('users');

Route::get('/ruangan',function(){
    return view('ruangan.index');
})->middleware('auth')->name('ruangan');

Route::get('/pegawai',function(){
    return view('pegawai.index');
})->middleware('auth')->name('pegawai');

Route::get('/perangkat',function(){
    return view('perangkat.index');
})->middleware('auth')->name('perangkat');

Route::get('/history',function(){
    return view('history.index');
})->middleware('auth')->name('history');

