{{-- 
------------------------------------------------
* resources/views/admin/dashboard.blade.php
* Admin Dashboard Page – extends admin layout (Syllaverse)
------------------------------------------------ 
--}}


@extends('layouts.admin')

@section('title', 'Dashboard • Admin • Syllaverse')

@section('content')
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Registered Faculty</h6>
                        <h3 class="text-dark fw-bold">32</h3>
                    </div>
                    <i class="bi bi-person-badge fs-2 text-danger"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Syllabi Submitted</h6>
                        <h3 class="text-dark fw-bold">148</h3>
                    </div>
                    <i class="bi bi-journal-text fs-2 text-danger"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Student Users</h6>
                        <h3 class="text-dark fw-bold">1,203</h3>
                    </div>
                    <i class="bi bi-people-fill fs-2 text-danger"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Add more content here --}}
    <div class="mt-5">
        <h6 class="fw-bold text-secondary mb-3">System Logs</h6>
        <div class="card border-0 shadow-sm p-3" style="min-height: 180px;">
            <p class="text-muted">No recent activity logs to display.</p>
        </div>
    </div>
@endsection
