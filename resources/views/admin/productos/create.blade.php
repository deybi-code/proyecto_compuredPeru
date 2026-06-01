@extends('layouts.admin')

@section('content')

<div class="admin-header">
    <h1>➕ Crear producto</h1>
    <a href="{{ route('admin.productos.index') }}" class="btn-primary">← Volver</a>
</div>

<div class="admin-form">
    <form method="POST" action="{{ route('admin.productos.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre del producto" required>
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" placeholder="Descripción del producto"></textarea>
        </div>

        <div class="form-group">
            <label>Precio (S/)</label>
            <input type="number" step="0.01" name="precio" placeholder="0.00" required>
        </div>

        <div class="form-group">
            <label>Categoría</label>
            <select name="categoria">
                <option value="Accesorio">Accesorios</option>
                <option value="Computadora">Computadoras</option>
                <option value="Laptop">Laptops</option>
                <option value="Redes">Redes / Conectividad</option>
                <option value="Case">Case</option>
                <option value="Fuente">Fuentes para Case</option>
                <option value="Cooler">Coolers/CPU - Refrigeración Líq.</option>
                <option value="Procesador">CPU - Procesadores</option>
                <option value="Disco Duro Externo">Discos Duros Externos</option>
                <option value="Disco Duro Interno">Discos Duros Internos</option>
                <option value="Disco Solido">Discos Sólidos Internos</option>
                <option value="Impresora">Impresoras</option>
                <option value="Memoria Flash">Memorias Flash</option>
                <option value="Memoria RAM">Memorias RAM</option>
                <option value="Monitor">Monitores</option>
                <option value="Placa Madre">Motherboards / Placas Madre</option>
                <option value="Mouse">Mouse</option>
                <option value="Mutigrabador">Mutigrabadores DVD/Blu Ray</option>
                <option value="Suministro Impresora">Suministros para Impresoras</option>
                <option value="Tablet">Tablets</option>
                <option value="Tarjeta Video">Tarjetas de Video</option>
                <option value="Teclado">Teclados</option>
                <option value="UPS">UPS, Estabilizadores</option>
            </select>
        </div>

        <div class="form-group">
            <label>Imagen</label>
            <input type="file" name="imagen">
        </div>

        <div class="form-group">
            <label class="form-check">
                <input type="checkbox" name="mostrar_inicio" value="1">
                Mostrar en "Los más valorados"
            </label>
        </div>

        <button type="submit" class="btn-primary">Guardar producto</button>
    </form>
</div>

@endsection