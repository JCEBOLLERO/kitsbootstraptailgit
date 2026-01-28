@extends('layouts.bootstrap')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <!-- Page header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="m-0 mb-1">Crear Estudiante</h2>
                        <p class="m-0">Añadir un nuevo estudiante</p>
                    </div>
                    <div>
                        <a href="{{ route('students.index') }}" class="btn btn-warning">Back to Students</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">

                        <div class="card-body p-4">
                            <!-- @if ($errors->any())
                                                                    <div class="alert alert-danger shadow-sm">
                                                                        <ul class="mb-0">
                                                                            @foreach ($errors->all() as $error)
                                                                                <li>{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif -->

                            <form action="{{ route('students.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold">Full Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="Teclee el nombre del estudiante">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <label for="email" class="form-label fw-semibold">Email Address</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="Teclee el email del estudiante">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                    <input type="text" name="phone" id="phone"
                                        class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}" placeholder="Teclee el teléfono del estudiante">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end gap-2 mt-4">
                                    <!-- <a href="{{ route('students.index') }}" class="btn btn-light btn-lg border">Cancel</a> -->
                                    <button type="submit" class="btn btn-info">Crear Estudiante</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection