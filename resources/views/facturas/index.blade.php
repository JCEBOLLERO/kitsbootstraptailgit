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
                        <h2 class="mb-2">Facturas</h2>
                        <p class="mb-0">Gestión de facturas</p>
                    </div>
                    <a href="{{ route('facturas.create') }}" class="btn btn-info">
                        Crear nueva factura
                    </a>
                </div>
                <!-- tabla con las notas -->
                <table class="table table-striped table-hover table-bordered border border-info-subtle">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($facturas as $factura)
                            <tr>
                                <td scope="row">{{ $factura->id }}</td>
                                <td>{{ $factura->cliente }}</td>
                                <td>{{ $factura->fecha }}</td>
                                <td>{{ $factura->total }}</td>
                                
                                <td class="d-flex">
                                    <a href="{{ route('facturas.show', $factura->id) }}" class="btn btn-primary me-2">Show</a>
                                    <a href="{{ route('facturas.edit', $factura->id) }}" class="btn btn-warning me-2">Edit</a>
                                    <div x-ignore>

                                        <form action="{{ route('facturas.destroy', $factura->id) }}" class="d-inline  m-0"
                                            method="POST"
                                            onsubmit="return confirm('¿ Estás seguro de querer borrar la factura ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">¡ No se encuentran facturas !</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="">
                    {{ $facturas->links() }}
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