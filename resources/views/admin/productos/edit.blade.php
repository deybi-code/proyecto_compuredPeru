@extends('layouts.admin')

@section('content')

<div class="admin-header">
    <h1>✏️ Editar producto</h1>
    <a href="{{ route('admin.productos.index') }}" class="btn-primary">← Volver</a>
</div>

<div class="admin-form">
    <form method="POST" action="{{ route('admin.productos.update', $producto->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{ $producto->nombre }}" required>
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion">{{ $producto->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label>Precio (S/)</label>
            <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" required>
        </div>

        <div class="form-group">
            <label>Categoría</label>
            <select name="categoria">
                <option value="Accesorio"            {{ $producto->categoria == 'Accesorio'            ? 'selected' : '' }}>Accesorios</option>
                <option value="Computadora"          {{ $producto->categoria == 'Computadora'          ? 'selected' : '' }}>Computadoras</option>
                <option value="Laptop"               {{ $producto->categoria == 'Laptop'               ? 'selected' : '' }}>Laptops</option>
                <option value="Redes"                {{ $producto->categoria == 'Redes'                ? 'selected' : '' }}>Redes / Conectividad</option>
                <option value="Case"                 {{ $producto->categoria == 'Case'                 ? 'selected' : '' }}>Case</option>
                <option value="Fuente"               {{ $producto->categoria == 'Fuente'               ? 'selected' : '' }}>Fuentes para Case</option>
                <option value="Cooler"               {{ $producto->categoria == 'Cooler'               ? 'selected' : '' }}>Coolers/CPU - Refrigeración Líq.</option>
                <option value="Procesador"           {{ $producto->categoria == 'Procesador'           ? 'selected' : '' }}>CPU - Procesadores</option>
                <option value="Disco Duro Externo"   {{ $producto->categoria == 'Disco Duro Externo'   ? 'selected' : '' }}>Discos Duros Externos</option>
                <option value="Disco Duro Interno"   {{ $producto->categoria == 'Disco Duro Interno'   ? 'selected' : '' }}>Discos Duros Internos</option>
                <option value="Disco Solido"         {{ $producto->categoria == 'Disco Solido'         ? 'selected' : '' }}>Discos Sólidos Internos</option>
                <option value="Impresora"            {{ $producto->categoria == 'Impresora'            ? 'selected' : '' }}>Impresoras</option>
                <option value="Memoria Flash"        {{ $producto->categoria == 'Memoria Flash'        ? 'selected' : '' }}>Memorias Flash</option>
                <option value="Memoria RAM"          {{ $producto->categoria == 'Memoria RAM'          ? 'selected' : '' }}>Memorias RAM</option>
                <option value="Monitor"              {{ $producto->categoria == 'Monitor'              ? 'selected' : '' }}>Monitores</option>
                <option value="Placa Madre"          {{ $producto->categoria == 'Placa Madre'          ? 'selected' : '' }}>Motherboards / Placas Madre</option>
                <option value="Mouse"                {{ $producto->categoria == 'Mouse'                ? 'selected' : '' }}>Mouse</option>
                <option value="Mutigrabador"         {{ $producto->categoria == 'Mutigrabador'         ? 'selected' : '' }}>Mutigrabadores DVD/Blu Ray</option>
                <option value="Suministro Impresora" {{ $producto->categoria == 'Suministro Impresora' ? 'selected' : '' }}>Suministros para Impresoras</option>
                <option value="Tablet"               {{ $producto->categoria == 'Tablet'               ? 'selected' : '' }}>Tablets</option>
                <option value="Tarjeta Video"        {{ $producto->categoria == 'Tarjeta Video'        ? 'selected' : '' }}>Tarjetas de Video</option>
                <option value="Teclado"              {{ $producto->categoria == 'Teclado'              ? 'selected' : '' }}>Teclados</option>
                <option value="UPS"                  {{ $producto->categoria == 'UPS'                  ? 'selected' : '' }}>UPS, Estabilizadores</option>
            </select>
        </div>

        <div class="form-group">
            @if($producto->imagen)
                <label>Imagen actual:</label>
                <img src="{{ asset('img/' . $producto->imagen) }}" width="100" style="display:block; margin: 8px 0; border-radius:4px;">
            @endif
            <label>Cambiar imagen (opcional)</label>
            <input type="file" name="imagen">
        </div>

        <div class="form-group">
            <label class="form-check">
                <input type="checkbox" name="mostrar_inicio" value="1" {{ $producto->mostrar_inicio ? 'checked' : '' }}>
                Mostrar en "Los más valorados"
            </label>
        </div>

        <button type="submit" class="btn-primary">Guardar cambios</button>
    </form>
</div>

@endsection