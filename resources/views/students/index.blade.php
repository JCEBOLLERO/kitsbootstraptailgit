@extends('layouts.bootstrap')

@section('content')
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <!-- success message -->
                <!-- @include ('partials.success-message') -->
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h2 class="mb-2">Students List</h2>
                    <a href="{{ route('students.create') }}" class="btn btn-info">Create New Student</a>
                </div>
                <div class="card-body">
                    <!-- @if (session('success')) <div class="alert alert-success">
                                        {{ session('success') }}
                                </div>
                                @endif -->

                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>
                                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary">Show</a>

                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>

                                        <form id="delete-form-{{ $student->id }}"
                                            action="{{ route('students.destroy', $student->id) }}" class="d-inline m-0"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this student?')">
                                            @csrf
                                            @method('DELETE')
                                            <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                                        </form>
                                        <button class="btn btn-danger" onclick="confirmDelete({{ $student->id }})">
                                            <i class="bi bi-trash"></i>
                                            Eliminar
                                        </button>

                                        <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                                                                    data-bs-target="#deleteStudentModal" data-id="{{ $student->id}}">
                                                                                                    Delete</button> -->










                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">No students found. Start by adding one!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="deleteStudentModal" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-tittle">¿ Borrar Estudiante ?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Estas seguro de eliminar el estudiante?</p>
                                                    <p>Esta acción no se puede deshacer</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <form id="deleteForm" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Borrar Estudiante</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
    <!-- @section('scripts')
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                const deleteButtons = document.querySelectorAll('.delete-btn');
                                                const deleteForm = document.getElementById('deletForm');
                                                deleteButtons.foreach(button => {
                                                    button.addEventListener('click', function () {
                                                        const studentId = this.dataset.id;
                                                        deleleForm.action = '/student/${studentId}';
                                                    })
                                                })
                                            })
                                        </script>
                                    @endsection -->



@endsection