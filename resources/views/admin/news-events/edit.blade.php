@extends('layouts.admin')
@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white fw-bold">Edit News / Event</div>
    <div class="card-body">
        <form action="{{ route('admin.news-events.update', $newsEvent) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.news-events._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Item</button>
                <a href="{{ route('admin.news-events.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
