@extends('layouts.bootstrap')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Page header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="m-0 mb-1">Ver Estudiante</h2>
                        <p class="m-0">Información del estudiante</p>
                    </div>
                    <div>
                        <a href="{{ route('students.index') }}" class="btn btn-warning">Volver a Estudiantes</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="border-bottom mb-4 pb-3">
                            <label class="small text-uppercase">Nombre</label>
                            <h3>{{ $student->name }}</h3>
                        </div>
                        <div class="mb-4">
                            <label class="small">email</label>
                            <p>{{ $student->email }}</p>
                        </div>
                        <div class="mb-4">
                            <label class="small">Teléfono</label>
                            <p>{{ $student->phone }}</p>
                        </div>
                        <div class="row g-3 border-top">
                            <div class="col-md-6">
                                <small class="d-block">Created</small>
                                <small class="text-primary">{{ $student->created_at->diffForHumans()}}</small>
                            </div>
                            <div class="col-md-6">
                                <small class="d-block">Last Updated</small>
                                <small class="text-primary">{{ $student->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection