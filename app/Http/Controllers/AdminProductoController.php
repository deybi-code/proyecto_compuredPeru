<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class AdminProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {
        return view('admin.productos.create');
    }

    public function store(Request $request)
    {
        $rutaImagen = null;

        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombre = time() . '.' . $archivo->getClientOriginalExtension();
            $archivo->move(public_path('img'), $nombre);
            $rutaImagen = $nombre;
        }

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $rutaImagen,
            'categoria' => $request->categoria,
            'mostrar_inicio' => $request->has('mostrar_inicio')
        ]);

        return redirect('/admin/productos')
            ->with('success', 'Producto creado');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.productos.edit', compact('producto'));
    }

    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);

        // Si sube imagen nueva, la guarda y reemplaza la anterior
        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombre = time() . '.' . $archivo->getClientOriginalExtension();
            $archivo->move(public_path('img'), $nombre);
            $producto->imagen = $nombre;
        }

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'categoria' => $request->categoria,
            'mostrar_inicio' => $request->has('mostrar_inicio')
        ]);

        return redirect('/admin/productos')
            ->with('success', 'Producto actualizado');
    }

    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect('/admin/productos')
            ->with('success', 'Producto eliminado');
    }
}