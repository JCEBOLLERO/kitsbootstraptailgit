@extends('layouts.bootstrap')

@section('content')
<div class="card">
  <div class="card-body">
    <h1 class="h3">Bienvenido, {{ auth()->user()->name }}</h1>
    <p>Este es tu nuevo dashboard con Bootstrap 5.</p>
  </div>
</div>
@endsection
