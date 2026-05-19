@extends('layouts.app')
@section('title', 'Staff Members')
@section('content')

<div class="card">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 text-primary"><i class="bi bi-person-badge me-2"></i>Staff Members List</h6>
        <a href="{{ route('staff.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i>Add Staff
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Position</th>
                        <th>Telephone</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($staff as $member)
                    <tr>
                        <td class="text-muted small">{{ $staff->firstItem() + $loop->index }}</td>
                        <td class="fw-semibold">{{ $member->staff_names }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $member->position }}</span></td>
                        <td><i class="bi bi-telephone text-muted me-1"></i>{{ $member->telephone }}</td>
                        <td class="text-center">
                            <a href="{{ route('staff.edit', $member) }}" class="btn btn-sm btn-outline-primary me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('staff.destroy', $member) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this staff member?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No staff members found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($staff->hasPages())
    <div class="card-footer bg-white">{{ $staff->links() }}</div>
    @endif
</div>

@endsection
