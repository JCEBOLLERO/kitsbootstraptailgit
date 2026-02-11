@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="m-0 mb-1">Ver Familias</h2>
                    <p class="m-0">Detalles de la familia</p>
                </div>
                <div>
                    <a href="{{ route('familias.index') }}" class="btn btn-warning">Volver a familias</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <div class="border-bottom mb-4 pb-3">
                        <label class="small text-uppercase">DESCRIPCIÓN</label>                    
                        <h3>{{ $familia->descripcion }}</h3>
                    </div>
                    <div class="mb-4">
                        <label class="text-uppercase small">NEMOTÉCNICO</label>
                        <p>{{ $familia->nemotecnico }}</p></h2>
                    </div>
                    <div class="row g-3 border-top">
                        <div class="col-md-6">
                            <small class="d-block">Creada</small>
                            <small class="text-primary">{{ $familia->created_at->diffForHumans()}}</small>
                        </div>
                        <div class="col-md-6">
                            <small class="d-block">Última actualización</small>
                            <small class="text-primary">{{ $familia->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
