@extends('layouts.app')
@section('title', 'Permissions')
@section('content')

<div class="card">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 text-primary"><i class="bi bi-key me-2"></i>Permissions List</h6>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i>Add Permission
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Approved By</th>
                        <th>Permission</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $perm)
                    <tr>
                        <td class="text-muted small">{{ $permissions->firstItem() + $loop->index }}</td>
                        <td class="fw-semibold">{{ $perm->student->stu_firstname }} {{ $perm->student->stu_lastname }}</td>
                        <td>{{ $perm->staff->staff_names }}</td>
                        <td><span class="badge bg-primary bg-opacity-10 text-primary">{{ $perm->permission_name }}</span></td>
                        <td><i class="bi bi-calendar3 text-muted me-1"></i>{{ \Carbon\Carbon::parse($perm->date)->format('d M Y') }}</td>
                        <td><i class="bi bi-clock text-muted me-1"></i>{{ \Carbon\Carbon::parse($perm->time)->format('H:i') }}</td>
                        <td class="text-center">
                            <a href="{{ route('permissions.edit', $perm) }}" class="btn btn-sm btn-outline-primary me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('permissions.destroy', $perm) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this permission?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No permissions found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($permissions->hasPages())
    <div class="card-footer bg-white">{{ $permissions->links() }}</div>
    @endif
</div>

@endsection
