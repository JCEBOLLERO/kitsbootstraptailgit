<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>MiPanel</title>
  <!-- @vite( ['resources/js/app.js']) -->
  @vite(['resources/js/app.js', 'resources/css/bootstrap.css'])
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<!-- LAYOUT BOOTSTRAP CARGADO -->

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('dashboard') }}">MiPanel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav me-auto">
          <li class="nav-item"><a class="nav-link" href="{{ route('notes.index') }}">Notes</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('students.index') }}">Students</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('proveedors.index') }}">Proveedores</a></li>
          <li class="nav-item"><a class="nav-link" href="">Users</a></li>
        </ul>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-outline-light">Salir</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- @vite( ['resources/css/app.css', 'resources/js/app.js']) -->
  <div class="container">
    @yield('content')
  </div>
  <x-swal />

</body>

</html>