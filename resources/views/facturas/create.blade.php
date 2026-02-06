@extends('layouts.bootstrap')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="m-0 mb-1">Crear Factura</h2>
                    <p class="m-0">Añade una nueva factura</p>
                </div>
                <div>
                    <a href="{{ route('facturas.index') }}" class="btn btn-warning">Regresar a Facturas</a>
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
                    <form action="{{ route('facturas.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="cliente" class="form-label">Cliente</label>
                            <input type="text" name="cliente" id="cliente" class="mb-2 form-control @error('cliente') is-invalid @enderror"
                            value = "{{ old('cliente') }}"
                            placeholder="Introduce el nombre del cliente" autofocus>
                            @error('Nombre')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror

                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="text" name="fecha" id="fecha" class="mb-2 form-control @error('fecha') is-invalid @enderror"
                             placeholder="Teclea fecha de la factura"
                             value="{{ old('fecha') }}" >
                            @error('CIF')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror

                            <h4 class="mt-4">Detalles</h4>

                            <table class="table table-bordered mt-3" id="tabla-detalles">
                                <thead>
                                    <tr>
                                        <th>Productos</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="detalles[0][producto]" id="" class="form-control" value="{{ old('detalles[0][producto]') }}"></td>
                                        <td><input type="number" name="detalles[0][cantidad]" id="" class="form-control"></td>
                                        <td><input type="number" name="detalles[0][precio]" id="" class="form-control"></td>
                                        <td><button type="button" class="btn btn-danger btn-sm eliminar-fila">X</button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-secondary" id="agregar-fila">Añadir línea</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>

                </div>
                <script>
                    let contador = 1;
                    document.getElementById('agregar-fila').addEventListener('click', function() {
                        const tabla = document.querySelector('#tabla-detalles tbody');
                        const fila = '<tr><td><input type="text" name="detalles[$(contador)][producto]" id="" class="form-control"></td>' +
                        '<td><input type="number" name="detalles[$(contador)][cantidad]" id="" class="form-control"></td>' + 
                        '<td><input type="number" name="detalles[$(contador)][precio]" id="" class="form-control"></td>' +
                        '<td><button type="button" class="btn btn-danger btn-sm" id="eliminar-fila">X</button></td></tr>';
                        tabla.insertAdjacentHTML('beforeend',fila);
                        contador++;
                    });
                    document.addEventListener('click', function(e) {
                        if (e.target.classList.contains('eliminar-fila')) {
                            e.target.closest('tr').remove();
                        }
                    });
                </script>
 
            </div>
        </div>
    </div>
</div>
@endsection
