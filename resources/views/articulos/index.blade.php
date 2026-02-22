@extends('layouts.bootstrap')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <!-- success message -->
                @include ('partials.success-message')
                <!-- Page header -->
                <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                    <div>
                        <h2 class="mb-2">Artículos</h2>
                        <p class="mb-0">Gestión de Artículos</p>
                    </div>
                    <a href="{{ route('articulos.create') }}" class="btn btn-info">
                        Crear nuevo Artículo
                    </a>
                </div>
                <!-- tabla con los proveedores -->
                <table class="table table-striped table-hover table-bordered border border-info-subtle">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Referencia</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Familia</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">P.Costo</th>
                            <th scope="col">PVP</th>

                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articulos as $articulo)
                            <tr>
                                <td scope="row">{{ $articulo->id }}</td>
                                <td>{{ $articulo->referencia }}</td>
                                <td>{{ $articulo->descripcion }}</td>
                                <td>{{ $articulo->familia->descripcion }}</td>
                                <td>{{ $articulo->proveedor->Nombre }}</td>
                                <td>{{ $articulo->preciocosto }}</td>
                                <td>{{ $articulo->pvp }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('articulos.show', $articulo->id) }}" class="btn btn-primary bi bi-eye me-2"></a>
                                    <a href="{{ route('articulos.edit', $articulo->id) }}" class="btn btn-warning bi bi-pencil-square me-2"></a>
                                    <div x-ignore>

                                        <form id="delete-form-{{ $articulo->id }}"
                                            action="{{ route('articulos.destroy', $articulo->id) }}" class="d-inline m-0"
                                            method="POST"
                                            onsubmit="return confirm('¿ Estás seguro de que desea borrar este cliente ?')">
                                            @csrf
                                            @method('DELETE')
                                            <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                                        </form>
                                        <button class="btn btn-danger" onclick="confirmDelete({{ $articulo->id }})">
                                            <i class="bi bi-trash"></i>
                                            
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">¡ No existen clientes !</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="">
                    {{ $articulos->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="deleteNoteModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-tittle">¿ Borrar Nota ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estas seguro de eliminar la nota?</p>
                        <p>Esta acción no se puede deshacer</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar Nota</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
@endsection
