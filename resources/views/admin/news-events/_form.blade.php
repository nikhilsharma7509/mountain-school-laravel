<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label fw-bold">Title *</label>
        <input type="text" name="title" value="{{ old('title', $newsEvent->title ?? '') }}" class="form-control @error('title') is-invalid @enderror" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-4">
        <label class="form-label fw-bold">Category *</label>
        <select name="category" class="form-select @error('category') is-invalid @enderror" required>
            @foreach(['News', 'Event', 'Achievement'] as $cat)
                <option value="{{ $cat }}" {{ old('category', $newsEvent->category ?? '') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
        </select>
        @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-4">
        <label class="form-label fw-bold">Date *</label>
        <input type="date" name="event_date" value="{{ old('event_date', isset($newsEvent) ? $newsEvent->event_date->format('Y-m-d') : '') }}" class="form-control @error('event_date') is-invalid @enderror" required>
        @error('event_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-4">
        <label class="form-label fw-bold">Published *</label>
        <select name="is_published" class="form-select">
            <option value="1" {{ old('is_published', $newsEvent->is_published ?? 1) == 1 ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ old('is_published', $newsEvent->is_published ?? 1) == 0 ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label fw-bold">Image (JPG/PNG/WebP, max 2MB)</label>
        <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" class="form-control @error('image') is-invalid @enderror">
        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-12">
        <label class="form-label fw-bold">Short Description *</label>
        <textarea name="short_description" rows="2" class="form-control @error('short_description') is-invalid @enderror" required>{{ old('short_description', $newsEvent->short_description ?? '') }}</textarea>
        @error('short_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-12">
        <label class="form-label fw-bold">Content *</label>
        <textarea name="content" rows="5" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $newsEvent->content ?? '') }}</textarea>
        @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>
