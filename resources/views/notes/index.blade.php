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
                        <h2 class="mb-2">Notes</h2>
                        <p class="mb-0">Manage all your notes in one place</p>
                    </div>
                    <a href="{{ route('notes.create') }}" class="btn btn-info">
                        Create New Note
                    </a>
                </div>
                <!-- tabla con las notas -->
                <table class="table table-striped table-hover table-bordered border border-info-subtle">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($notes as $note)
                            <tr>
                                <td scope="row">{{ $note->id }}</td>
                                <td>{{ $note->title }}</td>
                                <td>{{ Str::limit($note->content, 30) }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('notes.show', $note->id) }}" class="btn btn-primary me-2">Show</a>
                                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning me-2">Edit</a>
                                    <div x-ignore>

                                        <form action="{{ route('notes.destroy', $note->id) }}" class="d-inline  m-0"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this note?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No notes found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="">
                    {{ $notes->links() }}
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