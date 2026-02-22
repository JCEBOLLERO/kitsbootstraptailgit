@extends('layouts.bootstrap')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="m-0 mb-1">Crear Artículo</h2>
                    <p class="m-0">Añadir un Artículo</p>
                </div>
                <div>
                    <a href="{{ route('articulos.index') }}" class="btn btn-warning">Volver a articulos</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-4">
                    <form action="{{ route('articulos.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            

                            <label for="descripcion" class="form-label fw-semibold">Descripción</label>
                            <input type="text" name="descripcion" id="descripcion" 
                            class="form-control mb-3 @error('descripcion') is-invalid @enderror"
                            value = "{{ old('descripcion') }}"
                            placeholder="Nombre del artículo" autofocus>
                            @error('descripcion')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            
                            <label for="familia_id" class="form-label fw-semibold">Familia</label>
                            <select name="familia_id" id="familia_id"
                                class="form-select mb-3 @error('familia_id') is-invalid @enderror ml-2">
                                <option value="Selecciona una familia"></option>
                                @foreach($familias as $id=>$descripcion)
                                    <option value="{{ $id }}">
                                        {{ old('familia_id') == $id ? 'selected':'' }}
                                        {{ $descripcion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('familia_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror    

                            <label for="proveedor_id" class="form-label fw-semibold">Proveedor</label>
                            <select name="proveedor_id" id="proveedor_id"
                                class="form-select mb-3 @error('proveedor_id') is-invalid @enderror ml-2">
                                <option value="Selecciona un proveedor"></option>
                                @foreach($proveedores as $id=>$Nombre)
                                    <option value="{{ $id }}">
                                        {{ old('proveedor_id') == $id ? 'selected':'' }}
                                        {{ $Nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('familia_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror

                            <label for="preciocosto" class="form-label fw-semibold">Precio de Costo</label>
                            <input type="text" name="preciocosto" id="preciocosto" 
                            class="form-control mb-3 @error('preciocosto') is-invalid @enderror"
                            value = "{{ old('preciocosto') }}"
                            placeholder="Precio de costo" autofocus>
                            @error('preciocosto')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="pvp" class="form-label fw-semibold">PVP</label>
                            <input type="text" name="pvp" id="pvp" class="form-control mb-3 @error('pvp') is-invalid @enderror"
                            value = "{{ old('pvp') }}"
                            placeholder="Precio de venta" autofocus>
                            @error('pvp')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="refprove" class="form-label fw-semibold">Referencia del proveedor</label>
                            <input type="text" name="refprove" id="refprove" class="form-control mb-3 @error('refprove') is-invalid @enderror"
                            value = "{{ old('refprove') }}"
                            placeholder="Referencia del proveedor" autofocus>
                            @error('refprove')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <div class="d-flex align-items-center justify-content-between mb-3">

                                <label for="baja" class="form-check-label fw-semibold">Artículo dado de baja</label>
                                <div class="form-check form-switch m-0">
                                    <input type="checkbox" name="baja" id="baja" class="form-check-input mb-3"
                                    value = "{{ old('baja') ? 'checked':'' }}"
                                    >

                                </div>
                                @error('refprove')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-info">Crear Artículo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

