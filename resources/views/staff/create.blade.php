@extends('layouts.app')
@section('title', 'Add Staff Member')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0 text-primary"><i class="bi bi-person-plus me-2"></i>Add Staff Member</h6>
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif
                <form action="{{ route('staff.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Full Name</label>
                        <input type="text" name="staff_names" class="form-control" value="{{ old('staff_names') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Position</label>
                        <input type="text" name="position" class="form-control" value="{{ old('position') }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Telephone</label>
                        <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}" required>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i>Save</button>
                        <a href="{{ route('staff.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
