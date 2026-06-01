@extends('layouts.admin')

@section('content')

<div class="admin-header">
    <h1> Productos</h1>
    <a href="{{ route('admin.productos.create') }}" class="btn-primary">+ Nuevo producto</a>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Destacado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>
                @if($producto->imagen)
                    <img src="{{ asset('img/' . $producto->imagen) }}">
                @else
                    —
                @endif
            </td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->categoria }}</td>
            <td>S/ {{ $producto->precio }}</td>
            <td>
                @if($producto->mostrar_inicio)
                    <span class="badge-si">✅ Sí</span>
                @else
                    <span class="badge-no">No</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.productos.edit', $producto->id) }}" class="btn-editar">✏️ Editar</a>
                <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-eliminar" onclick="return confirm('¿Eliminar este producto?')">🗑️ Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection