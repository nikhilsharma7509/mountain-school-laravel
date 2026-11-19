@extends('layouts.admin')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
    <h4 class="fw-bold mb-0">Admission Enquiries</h4>

    <form method="GET" action="{{ route('admin.enquiries.index') }}" class="d-flex gap-2">
        <input type="text" name="search" value="{{ $search }}" class="form-control form-control-sm" placeholder="Search name or mobile...">
        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
            <option value="">All Statuses</option>
            @foreach(['New', 'Contacted', 'Closed'] as $st)
                <option value="{{ $st }}" {{ $status === $st ? 'selected' : '' }}>{{ $st }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-sm btn-primary">Filter</button>
    </form>
</div>

<div id="statusToast" class="alert alert-success py-2 px-3 small d-none"></div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Parent &amp; Student</th>
                    <th>Class</th>
                    <th>Contact</th>
                    <th>CRM Push</th>
                    <th>Status (AJAX)</th>
                    <th>Submitted</th>
                </tr>
            </thead>
            <tbody>
                @forelse($enquiries as $enquiry)
                    <tr>
                        <td>{{ $enquiry->id }}</td>
                        <td>
                            <div class="fw-bold">{{ $enquiry->parent_name }}</div>
                            <small class="text-muted">Student: {{ $enquiry->student_name }}</small>
                        </td>
                        <td><span class="badge bg-info text-dark">{{ $enquiry->class_applying_for }}</span></td>
                        <td>
                            <div>{{ $enquiry->mobile }}</div>
                            @if($enquiry->email)<small class="text-muted">{{ $enquiry->email }}</small>@endif
                        </td>
                        <td>
                            @if($enquiry->crm_status === 'Sent')
                                <span class="badge bg-success">Sent</span>
                            @elseif($enquiry->crm_status === 'Failed')
                                <span class="badge bg-danger" title="{{ $enquiry->crm_response }}">Failed</span>
                            @else
                                <span class="badge bg-secondary">Pending</span>
                            @endif
                        </td>
                        <td style="width: 160px;">
                            <select class="form-select form-select-sm status-selector"
                                    data-url="{{ route('admin.enquiries.status', $enquiry) }}">
                                @foreach(['New', 'Contacted', 'Closed'] as $st)
                                    <option value="{{ $st }}" {{ $enquiry->status === $st ? 'selected' : '' }}>
                                        {{ $st }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td><small>{{ $enquiry->created_at->format('d M Y, h:i A') }}</small></td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center py-4 text-muted">No enquiries found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white">
        {{ $enquiries->links('pagination::bootstrap-5') }}
    </div>
</div>

<script>
document.querySelectorAll('.status-selector').forEach(select => {
    select.addEventListener('change', async function () {
        const url = this.dataset.url;
        const status = this.value;
        const toast = document.getElementById('statusToast');

        try {
            const res = await fetch(url, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ status })
            });
            const data = await res.json();
            if (res.ok) {
                toast.className = 'alert alert-success py-2 px-3 small';
                toast.textContent = data.message;
                setTimeout(() => toast.classList.add('d-none'), 3000);
            }
        } catch (err) {
            alert('Failed to update status.');
        }
    });
});
</script>
@endsection
