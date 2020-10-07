<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('web.index');
});

Route::middleware(['auth:sanctum', 'verified'])->group( function(){

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/admin/users', function () { return view('admin.users'); })->name('users');

});



