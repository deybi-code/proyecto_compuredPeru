<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProductoController;

use App\Models\Producto;

Route::get('/', function () {
    $destacados = Producto::where('mostrar_inicio', 1)->get();
    return view('index', compact('destacados'));
})->name('inicio');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth', 'es_admin'])->group(function () {
    Route::resource('admin/productos', AdminProductoController::class)->names('admin.productos');
});

Route::get('/carrito', function () {
    return view('carrito');
})->name('carrito');

Route::get('/categoria/{categoria}', function ($categoria) {
    $productos = Producto::where('categoria', $categoria)->get();
    return view('categoria', compact('productos', 'categoria'));
})->name('categoria');

Route::get('/producto/{id}', function ($id) {
    $producto = Producto::findOrFail($id);
    $relacionados = Producto::where('categoria', $producto->categoria)
                    ->where('id', '!=', $producto->id)
                    ->take(3)
                    ->get();
    return view('producto', compact('producto', 'relacionados'));
})->name('producto');

Route::get('/buscar', function () {
    $texto = request('buscar');
    $categoria_filtro = request('categoria_filtro');
    $query = Producto::where('nombre', 'like', "%$texto%");
    if ($categoria_filtro) {
        $query->where('categoria', $categoria_filtro);
    }
    $productos = $query->get();
    return view('buscar', compact('productos', 'texto'));
})->name('buscar');

require __DIR__.'/auth.php';