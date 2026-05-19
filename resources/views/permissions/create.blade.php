@extends('layouts.app')
@section('title', 'Add Permission')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0 text-primary"><i class="bi bi-key me-2"></i>Add New Permission</h6>
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Student</label>
                            <select name="student_id" class="form-select" required>
                                <option value="">Select student...</option>
                                @foreach($students as $s)
                                    <option value="{{ $s->id }}" {{ old('student_id')==$s->id?'selected':'' }}>
                                        {{ $s->stu_firstname }} {{ $s->stu_lastname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Approved By (Staff)</label>
                            <select name="staff_id" class="form-select" required>
                                <option value="">Select staff...</option>
                                @foreach($staff as $st)
                                    <option value="{{ $st->id }}" {{ old('staff_id')==$st->id?'selected':'' }}>
                                        {{ $st->staff_names }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Permission Name</label>
                            <input type="text" name="permission_name" class="form-control" value="{{ old('permission_name') }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Date</label>
                            <input type="date" name="date" class="form-control" value="{{ old('date', date('Y-m-d')) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Time</label>
                            <input type="time" name="time" class="form-control" value="{{ old('time') }}" required>
                        </div>
                        <div class="col-12 d-flex gap-2 mt-2">
                            <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i>Save</button>
                            <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
