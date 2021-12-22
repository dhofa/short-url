<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\ShortLink;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('index');
});

Route::get('generate-link', [ShortLink::class, 'index']);
Route::post('generate-link', [ShortLink::class, 'store'])->name('generate.link.store');

Route::get('{code}', [ShortLink::class, 'viewLink'])->name('view.link');

