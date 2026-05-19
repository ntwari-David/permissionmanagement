@extends('layouts.app')
@section('title', 'Reports')
@section('content')

<div class="card mb-4">
    <div class="card-body py-3">
        <form method="GET" action="{{ route('reports.index') }}" class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label fw-semibold small">Report Type</label>
                <select name="type" class="form-select" onchange="this.form.submit()">
                    <option value="daily"   {{ $type=='daily'   ? 'selected':'' }}>Daily Report</option>
                    <option value="monthly" {{ $type=='monthly' ? 'selected':'' }}>Monthly Report</option>
                </select>
            </div>
            @if($type === 'monthly')
            <div class="col-md-3">
                <label class="form-label fw-semibold small">Select Month</label>
                <input type="month" name="month" class="form-control" value="{{ $month }}">
            </div>
            @else
            <div class="col-md-3">
                <label class="form-label fw-semibold small">Select Date</label>
                <input type="date" name="date" class="form-control" value="{{ $date }}">
            </div>
            @endif
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-search me-1"></i>Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 text-primary">
            <i class="bi bi-bar-chart-line me-2"></i>
            @if($type === 'monthly')
                Monthly Report — {{ \Carbon\Carbon::parse($month)->format('F Y') }}
            @else
                Daily Report — {{ \Carbon\Carbon::parse($date)->format('d F Y') }}
            @endif
        </h6>
        <span class="badge bg-primary rounded-pill">{{ $permissions->count() }} record(s)</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Class</th>
                        <th>Level</th>
                        <th>Permission</th>
                        <th>Description</th>
                        <th>Approved By</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $i => $perm)
                    <tr>
                        <td class="text-muted small">{{ $i + 1 }}</td>
                        <td class="fw-semibold">{{ $perm->student->stu_firstname }} {{ $perm->student->stu_lastname }}</td>
                        <td>{{ $perm->student->class_name }}</td>
                        <td>{{ $perm->student->level }}</td>
                        <td><span class="badge bg-primary bg-opacity-10 text-primary">{{ $perm->permission_name }}</span></td>
                        <td class="text-muted small" style="max-width:200px;">{{ Str::limit($perm->description, 50) }}</td>
                        <td>{{ $perm->staff->staff_names }}</td>
                        <td>{{ \Carbon\Carbon::parse($perm->date)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($perm->time)->format('H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-5">
                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>No records found for this period.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
