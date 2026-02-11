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
                        <div x-data="clientSelector({ clientes: @js($clientes) })" class="mb-4">

    <!-- Código Cliente -->
    <label for="codcliente" class="form-label">Código de Cliente</label>
    <input type="text"
           name="codcliente"
           id="codcliente"
           class="mb-2 form-control @error('codcliente') is-invalid @enderror"
           x-model="clientCode"
           @keyup.debounce="findClientByCode()">

    @error('codcliente')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror

    <!-- Nombre Cliente -->
    <label for="cliente" class="form-label">Cliente</label>
    <input type="text"
           name="cliente"
           id="cliente"
           class="mb-2 form-control @error('cliente') is-invalid @enderror"
           x-model="clientName">

    @error('cliente')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror

    <!-- Botón abrir modal -->
    <div class="col-md-2 d-flex align-items-end">
        <button type="button"
                class="btn btn-secondary w-100"
                data-bs-toggle="modal"
                data-bs-target="#clientModal">
            Buscar
        </button>
    </div>

    <!-- 🔥 MODAL DENTRO DEL X-DATA 🔥 -->
    <div class="modal fade" id="clientModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Seleccionar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="text"
                           class="form-control mb-3"
                           placeholder="Buscar cliente..."
                           x-model="search"
                           @input="filterClients()">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>CIF</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <template x-for="cliente in filteredClients" :key="cliente.id">
                                <tr>
                                    <td x-text="cliente.id"></td>
                                    <td x-text="cliente.nombre"></td>
                                    <td x-text="cliente.cif"></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm"
                                                @click="selectClient(cliente)"
                                                data-bs-dismiss="modal">
                                            Seleccionar
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

</div> <!-- ← ESTE ES EL CIERRE CORRECTO DEL X-DATA -->

                        <div class="mb-4">

                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="mb-2 form-control @error('fecha') is-invalid @enderror"
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
                                        <td><button class="btn btn-danger btn-sm eliminar-fila">X</button></td>
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
