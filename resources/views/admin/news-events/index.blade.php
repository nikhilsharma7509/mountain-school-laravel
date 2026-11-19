@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">News &amp; Events</h4>
    <a href="{{ route('admin.news-events.create') }}" class="btn btn-primary btn-sm">+ Add New Item</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Image</th>
                    <th>Title &amp; Slug</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Published</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td><img src="{{ $item->image_url }}" width="64" height="44" class="rounded object-fit-cover"></td>
                        <td>
                            <div class="fw-bold">{{ $item->title }}</div>
                            <small class="text-muted">/news-events/{{ $item->slug }}</small>
                        </td>
                        <td><span class="badge bg-secondary">{{ $item->category }}</span></td>
                        <td>{{ $item->event_date->format('d M Y') }}</td>
                        <td>
                            <span class="badge {{ $item->is_published ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ $item->is_published ? 'Yes' : 'No' }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.news-events.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.news-events.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this item?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center py-4 text-muted">No items found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white">{{ $items->links('pagination::bootstrap-5') }}</div>
</div>
@endsection
