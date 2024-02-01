<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetteControler;

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

Route::get('/', [RecetteControler::class, 'index']);

Route::resource('recette',RecetteControler::class);

Route::get('/search', [RecetteControler::class , 'search'])->name('recette.search');