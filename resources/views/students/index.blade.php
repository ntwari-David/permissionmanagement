@extends('layouts.app')
@section('title', 'Students')
@section('content')

<div class="card">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 text-primary"><i class="bi bi-people me-2"></i>Students List</h6>
        <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i>Add Student
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Class</th>
                        <th>Level</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                    <tr>
                        <td class="text-muted small">{{ $students->firstItem() + $loop->index }}</td>
                        <td class="fw-semibold">{{ $student->stu_firstname }}</td>
                        <td>{{ $student->stu_lastname }}</td>
                        <td>
                            <span class="badge rounded-pill px-3 py-1 {{ $student->gender === 'Male' ? 'badge-male' : 'badge-female' }}">
                                {{ $student->gender }}
                            </span>
                        </td>
                        <td>{{ $student->class_name }}</td>
                        <td>{{ $student->level }}</td>
                        <td class="text-center">
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-outline-primary me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this student?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No students found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($students->hasPages())
    <div class="card-footer bg-white">{{ $students->links() }}</div>
    @endif
</div>

@endsection
