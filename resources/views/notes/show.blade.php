@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="m-0 mb-1">View Note</h2>
                    <p class="m-0">Note details and content</p>
                </div>
                <div>
                    <a href="{{ route('notes.index') }}" class="btn btn-warning">Back to Notes</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <div class="border-bottom mb-4 pb-3">
                        <label class="small text-uppercase">TITLE</label>                    
                        <h3>{{ $note->title }}</h3>
                    </div>
                    <div class="mb-4">
                        <label class="text-uppercase small">CONTENT</label>
                        <p>{{ $note->content }}</p></h2>
                    </div>
                    <div class="row g-3 border-top">
                        <div class="col-md-6">
                            <small class="d-block">Created</small>
                            <small class="text-primary">{{ $note->created_at->diffForHumans()}}</small>
                        </div>
                        <div class="col-md-6">
                            <small class="d-block">Last Updated</small>
                            <small class="text-primary">{{ $note->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
