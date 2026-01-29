@extends('layouts.bootstrap')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="m-0 mb-1">Create Proveedor</h2>
                    <p class="m-0">Añade un nuevo proveedor</p>
                </div>
                <div>
                    <a href="{{ route('proveedors.index') }}" class="btn btn-warning">Regresar a Proveedores</a>
                </div>
            </div>

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <div class="card">
                <div class="card-body p-4">
                    <form action="{{ route('proveedors.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="Nombre" class="form-label">Nombre</label>
                            <input type="text" name="Nombre" id="Nombre" class="mb-2 form-control @error('Nombre') is-invalid @enderror"
                            value = "{{ old('Nombre') }}"
                            placeholder="Introduce el nombre del proveedor" autofocus>
                            @error('Nombre')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="CIF" class="form-label">CIF</label>
                            <input type="text" name="CIF" id="CIF" class="mb-2 form-control @error('CIF') is-invalid @enderror"
                             placeholder="Teclea dirección del proveedor"
                             value="{{ old('CIF') }}" >
                            @error('CIF')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="Dirección" class="form-label">Dirección</label>
                            <input type="text" name="Dirección" id="Direccion" class="mb-2 form-control @error('Dirección') is-invalid @enderror"
                             placeholder="Teclea dirección del proveedor"
                             value="{{ old('Dirección') }}" >
                            @error('Dirección')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="Población" class="form-label">Población</label>
                            <input type="text" name="Población" id="Poblacion" class="mb-2 form-control @error('Población') is-invalid @enderror"
                             placeholder="Teclea población del proveedor"
                             value="{{ old('Población') }}" >
                            @error('Población')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="Provincia" class="form-label">Provincia</label>
                            <input type="text" name="Provincia" id="Provincia" class="mb-2 form-control @error('Provincia') is-invalid @enderror"
                             placeholder="Teclea la provincia del proveedor"
                             value="{{ old('Provincia') }}" >
                            @error('Provincia')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="CodPostal" class="form-label">Código Postal</label>
                            <input type="text" name="CodPostal" id="CodPostal" class="mb-2 form-control @error('CodPostal') is-invalid @enderror"
                             placeholder="Teclea el código postal del proveedor"
                             value="{{ old('CodPostal') }}" >
                            @error('CodPostal')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="Teléfono" class="form-label">Teléfono</label>
                            <input type="text" name="Teléfono" id="Teléfono" class="mb-2 form-control @error('Teléfono') is-invalid @enderror"
                             placeholder="Teclea el teléfono del proveedor"
                             value="{{ old('Teléfono') }}" >
                            @error('Teléfono')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            
                            
                            

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-info">Crear Proveedor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
