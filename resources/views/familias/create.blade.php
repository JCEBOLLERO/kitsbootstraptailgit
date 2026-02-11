@extends('layouts.bootstrap')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="m-0 mb-1">Crear Familia</h2>
                    <p class="m-0">Añadir una familia</p>
                </div>
                <div>
                    <a href="{{ route('familias.index') }}" class="btn btn-warning">Volver a familias</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-4">
                    <form action="{{ route('familias.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                            value = "{{ old('descripcion') }}"
                            placeholder="Nombre de la familia" autofocus>
                            @error('descripcion')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="nemotecnico" class="form-label">Nemotécnico</label>
                            <input type="text" name="nemotecnico" id="nemotecnico" class="form-control @error('nemotécnico') is-invalid @enderror"
                            value = "{{ old('nemotécnico') }}"
                            placeholder="Nemotécnico" autofocus>
                            @error('nemotecnico')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-info">Crear Familia</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
