@extends('layouts.bootstrap')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Page header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="m-0 mb-1">Ver Cliente</h2>
                        <p class="m-0">Información del cliente</p>
                    </div>
                    <div>
                        <a href="{{ route('clientes.index') }}" class="btn btn-warning">Volver a Clientes</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">Nombre</label>
                            <h3>{{ $cliente->nombre }}</h3>
                        </div>
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">CIF</label>
                            <h3>{{ $cliente->cif }}</h3>
                        </div>
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">Dirección</label>
                            <h3>{{ $cliente->direccion }}</h3>
                        </div>
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">Población</label>
                            <h3>{{ $cliente->poblacion }}</h3>
                        </div>
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">Provincia</label>
                            <h3>{{ $cliente->provincia }}</h3>
                        </div>
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">Código Postal</label>
                            <h3>{{ $cliente->codpostal }}</h3>
                        </div>
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">email</label>
                            <h3>{{ $cliente->email }}</h3>
                        </div>
                        <div class="row g-3">

                            <div class="col-md-6 border-bottom mb-4 pb-3">
                                <label class="small text-uppercase">Teléfono 1</label>
                                <h3>{{ $cliente->telefono1 }}</h3>
                            </div>
                            <div class="col-md-6 border-bottom mb-4 pb-3">
                                <label class="small text-uppercase">Teléfono 2</label>
                                <h3>{{ $cliente->telefono2 }}</h3>
                            </div>
                        </div>
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">Observaciones</label>
                            <h3>

                                <textarea class="form-control" >{{ $cliente->observaciones }}</textarea>
                            </h3>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <small class="d-block">Created</small>
                                <small class="text-primary">{{ $cliente->created_at->diffForHumans()}}</small>
                            </div>
                            <div class="col-md-6">
                                <small class="d-block">Last Updated</small>
                                <small class="text-primary">{{ $cliente->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection