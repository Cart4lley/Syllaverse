{{-- ------------------------------------------------
* File: resources/views/superadmin/system-logs.blade.php
* Description: Super Admin – System Logs Page (Syllaverse)
------------------------------------------------ --}}
@extends('layouts.superadmin')

@section('title', 'System Logs • Super Admin • Syllaverse')
@section('page-title', 'System Logs')

@section('content')
<div class="card border-0 shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h6 class="fw-bold text-secondary mb-0">System Activity Logs</h6>
        <div class="input-group" style="max-width: 300px;">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="search" class="form-control" placeholder="Search logs..." aria-label="Search logs">
        </div>
    </div>

    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>Date & Time</th>
                <th>User</th>
                <th>Role</th>
                <th>Action</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            {{-- Example row --}}
            <tr>
                <td>2025-06-24 09:15 AM</td>
                <td>Maria Santos</td>
                <td>Faculty</td>
                <td>Edited Syllabus</td>
                <td>Updated ILO for BAT 403</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
