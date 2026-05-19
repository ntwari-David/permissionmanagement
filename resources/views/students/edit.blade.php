@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0 text-primary"><i class="bi bi-pencil-square me-2"></i>Edit Student</h6>
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif
                <form action="{{ route('students.update', $student) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">First Name</label>
                            <input type="text" name="stu_firstname" class="form-control" value="{{ old('stu_firstname', $student->stu_firstname) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Last Name</label>
                            <input type="text" name="stu_lastname" class="form-control" value="{{ old('stu_lastname', $student->stu_lastname) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Gender</label>
                            <select name="gender" class="form-select" required>
                                <option value="Male"   {{ $student->gender=='Male'   ? 'selected':'' }}>Male</option>
                                <option value="Female" {{ $student->gender=='Female' ? 'selected':'' }}>Female</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Class Name</label>
                            <input type="text" name="class_name" class="form-control" value="{{ old('class_name', $student->class_name) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Level</label>
                            <input type="text" name="level" class="form-control" value="{{ old('level', $student->level) }}" required>
                        </div>
                        <div class="col-12 d-flex gap-2 mt-2">
                            <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i>Update</button>
                            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
