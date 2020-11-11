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

Route::get('/admin/metro', function () {
    return view('admin.metro');
});




Route::middleware(['auth:sanctum', 'verified' , 'admin'])->group( function(){

    Route::get('/admin/productos', [AdminController::class, 'productos'])->name('productos');
    Route::get('pdf/{pedido}', [AdminController::class, 'downloadpdf'])->name('pdf');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('users');
    Route::get('/admin/fabricantes', [AdminController::class, 'fabricantes'])->name('fabricantes');
    Route::get('/admin/pedidos', [AdminController::class, 'pedidos'])->name('pedidos');
    Route::get('/admin/productos/desactivar', [AdminController::class, 'productosDesactivar'])->name('productos/desactivar');
    Route::get('/admin/productos/modificar-precio', [AdminController::class, 'productosModificarPrecio'])->name('productos/modificar-precio');

});






