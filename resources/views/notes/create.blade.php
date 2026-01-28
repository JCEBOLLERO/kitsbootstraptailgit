@extends('layouts.bootstrap')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="m-0 mb-1">Create Note</h2>
                    <p class="m-0">Add a new note to your collection</p>
                </div>
                <div>
                    <a href="{{ route('notes.index') }}" class="btn btn-warning">Back to Notes</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-4">
                    <form action="{{ route('notes.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                            value = "{{ old('title') }}"
                            placeholder="Enter a descriptive title" autofocus>
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="8"
                             placeholder="Write your note content here...">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-info">Create Note</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection