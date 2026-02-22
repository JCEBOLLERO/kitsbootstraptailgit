@extends('layouts.bootstrap')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Page header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="m-0 mb-1">Ver Artículo</h2>
                        <p class="m-0">Información del Artículo</p>
                    </div>
                    <div>
                        <a href="{{ route('articulos.index') }}" class="btn btn-warning">Volver a Artículos</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">Referencia</label>
                            <h3>{{ $articulo->referencia }}</h3>
                        </div>
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">Descripción</label>
                            <h3>{{ $articulo->descripcion }}</h3>
                        </div>
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">Familia</label>
                            <h3>{{ $articulo->familia->descripcion }}</h3>
                        </div>
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">Proveedor</label>
                            <h3>{{ $articulo->proveedor->Nombre }}</h3>
                        </div>
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">Precio Costo</label>
                            <h3>{{ $articulo->preciocosto }}</h3>
                        </div>
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">PVP</label>
                            <h3>{{ $articulo->pvp }}</h3>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-3">

                            <label for="baja" class="form-check-label fw-semibold fs-3">Artículo dado de baja</label>
                            <div class="form-check form-switch fw-semibold m-0">

                                    <input type="checkbox" name="baja" id="baja" class="form-check-input mb-3 fs-3 fs-semibold"
                                    value = "{{ $articulo->baja }}" disabled
                                    >
                                </div>
                        </div>
                        
                        <div class="row g-3 border-top">
                            <div class="col-md-6">
                                <small class="d-block">Created</small>
                                <small class="text-primary">{{ $articulo->created_at->diffForHumans()}}</small>
                            </div>
                            <div class="col-md-6">
                                <small class="d-block">Last Updated</small>
                                <small class="text-primary">{{ $articulo->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

