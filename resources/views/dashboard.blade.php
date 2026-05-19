@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#1a237e,#3949ab);">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="mb-1 opacity-75 small">Total Students</p>
                    <h2 class="fw-bold mb-0">{{ $totalStudents }}</h2>
                </div>
                <div class="bg-white bg-opacity-25 rounded-3 p-2">
                    <i class="bi bi-people fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#00695c,#00897b);">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="mb-1 opacity-75 small">Total Staff</p>
                    <h2 class="fw-bold mb-0">{{ $totalStaff }}</h2>
                </div>
                <div class="bg-white bg-opacity-25 rounded-3 p-2">
                    <i class="bi bi-person-badge fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#e65100,#ef6c00);">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="mb-1 opacity-75 small">Total Permissions</p>
                    <h2 class="fw-bold mb-0">{{ $totalPermissions }}</h2>
                </div>
                <div class="bg-white bg-opacity-25 rounded-3 p-2">
                    <i class="bi bi-key fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#6a1b9a,#8e24aa);">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="mb-1 opacity-75 small">Today's Permissions</p>
                    <h2 class="fw-bold mb-0">{{ $todayPermissions }}</h2>
                </div>
                <div class="bg-white bg-opacity-25 rounded-3 p-2">
                    <i class="bi bi-calendar-check fs-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white py-3">
        <h6 class="mb-0 text-primary"><i class="bi bi-clock-history me-2"></i>Quick Overview</h6>
    </div>
    <div class="card-body">
        <div class="row text-center g-3">
            <div class="col-md-4">
                <a href="{{ route('students.index') }}" class="text-decoration-none">
                    <div class="p-4 rounded-3" style="background:#f0f4ff;">
                        <i class="bi bi-people fs-2 text-primary"></i>
                        <p class="mt-2 mb-0 fw-semibold text-primary">Manage Students</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('permissions.create') }}" class="text-decoration-none">
                    <div class="p-4 rounded-3" style="background:#fff3e0;">
                        <i class="bi bi-plus-circle fs-2 text-warning"></i>
                        <p class="mt-2 mb-0 fw-semibold text-warning">New Permission</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('reports.index') }}" class="text-decoration-none">
                    <div class="p-4 rounded-3" style="background:#f3e5f5;">
                        <i class="bi bi-bar-chart-line fs-2 text-purple" style="color:#8e24aa;"></i>
                        <p class="mt-2 mb-0 fw-semibold" style="color:#8e24aa;">View Reports</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
