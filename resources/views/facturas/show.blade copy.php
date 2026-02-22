@extends('layouts.bootstrap')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="m-0 mb-1">Mostrar Factura</h2>
                <!--    <p class="m-0">Añade una nueva factura</p> -->
                </div>
                <div>
                    <a href="{{ route('facturas.index') }}" class="btn btn-warning">Regresar a Facturas</a>
                </div>
            </div>

            <h2>Factura #{{ $factura->id }}</h2>

            <p>Cliente: {{$factura-> codcliente}}  -  {{ $factura->cliente }}</p>
            <p>Fecha: {{ $factura->fecha }}</p>
            <div class="card">
                <div class="card-body p-4">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($factura->detalles as $d)
                            <tr>
                                <td>{{ $d->producto }}</td>
                                <td>{{ $d->cantidad }}</td>
                                <td>{{ $d->precio }}</td>
                                <td>{{ $d->subtotal }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p><strong>Total:</strong> {{ $factura->total }}</p>

                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
