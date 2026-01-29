@extends('layouts.bootstrap')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Page header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="m-0 mb-1">Ver Proveedor</h2>
                        <p class="m-0">Información del proveedor</p>
                    </div>
                    <div>
                        <a href="{{ route('proveedors.index') }}" class="btn btn-warning">Volver a Proveedores</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">Nombre</label>
                            <h3>{{ $proveedor->Nombre }}</h3>
                        </div>
                        <div class="mb-4">
                            <label class="small">CIF</label>
                            <p>{{ $proveedor->CIF }}</p>
                        </div>
                        <div class="mb-4">
                            <label class="small">Dirección</label>
                            <p>{{ $proveedor->Dirección }}</p>
                        </div>
                        <div class="mb-4">
                            <label class="small">Población</label>
                            <p>{{ $proveedor->Población }}</p>
                        </div>
                        <div class="mb-4">
                            <label class="small">Provincia</label>
                            <p>{{ $proveedor->Provincia }}</p>
                        </div>
                        <div class="mb-4">
                            <label class="small">Teléfono</label>
                            <p>{{ $proveedor->Teléfono }}</p>
                        </div>

                        <div class="row g-3 border-top">
                            <div class="col-md-6">
                                <small class="d-block">Creado</small>
                                <small class="text-primary">{{ $proveedor->created_at->diffForHumans()}}</small>
                            </div>
                            <div class="col-md-6">
                                <small class="d-block">Última actualización</small>
                                <small class="text-primary">{{ $proveedor->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
