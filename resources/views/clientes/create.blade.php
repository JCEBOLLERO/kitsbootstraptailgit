@extends('layouts.bootstrap')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="m-0 mb-1">Crear Cliente</h2>
                    <p class="m-0">Añade un nuevo cliente</p>
                </div>
                <div>
                    <a href="{{ route('clientes.index') }}" class="btn btn-warning">Regresar a Cliente</a>
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
                    <form action="{{ route('clientes.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="mb-2 form-control @error('nombre') is-invalid @enderror"
                            value = "{{ old('nombre') }}"
                            placeholder="Introduce el nombre del cliente" autofocus>
                            @error('nombre')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="cif" class="form-label">CIF</label>
                            <input type="text" name="cif" id="cif" class="mb-2 form-control @error('cif') is-invalid @enderror"
                             placeholder="Teclea el CIF del cliente"
                             value="{{ old('cif') }}" >
                            @error('cif')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="mb-2 form-control @error('direccion') is-invalid @enderror"
                             placeholder="Teclea dirección del cliente"
                             value="{{ old('direccion') }}" >
                            @error('direccion')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="poblacion" class="form-label">Población</label>
                            <input type="text" name="poblacion" id="poblacion" class="mb-2 form-control @error('poblacion') is-invalid @enderror"
                             placeholder="Teclea población del cliente"
                             value="{{ old('poblacion') }}" >
                            @error('poblacion')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="provincia" class="form-label">Provincia</label>
                            <input type="text" name="provincia" id="provincia" class="mb-2 form-control @error('provincia') is-invalid @enderror"
                             placeholder="Teclea la provincia del cliente"
                             value="{{ old('provincia') }}" >
                            @error('provincia')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="codpostal" class="form-label">Código Postal</label>
                            <input type="text" name="codpostal" id="codpostal" class="mb-2 form-control @error('codpostal') is-invalid @enderror"
                             placeholder="Teclea el código postal del cliente"
                             value="{{ old('codpostal') }}" >
                            @error('codpostal')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="telefono1" class="form-label">Teléfono 1</label>
                            <input type="text" name="telefono1" id="telefono1" class="mb-2 form-control @error('telefono1') is-invalid @enderror"
                             placeholder="Teclea el teléfono 1 del cliente"
                             value="{{ old('telefono1') }}" >
                            @error('telefono1')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="telefono2" class="form-label">Teléfono 2</label>
                            <input type="text" name="telefono2" id="telefono2" class="mb-2 form-control @error('telefono2') is-invalid @enderror"
                             placeholder="Teclea el teléfono 2 del cliente"
                             value="{{ old('telefono2') }}" >
                            @error('telefono2')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror

                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" id="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="Teclee el email del cliente">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control" rows="5" id="observaciones" name="observa"></textarea>
                            
                            @error('observa')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror

                            
                            
                            

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-info">Crear Cliente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
