{{-- ------------------------------------------------
* File: resources/views/superadmin/manage-accounts.blade.php
* Description: Super Admin Manage Accounts Page (Syllaverse)
------------------------------------------------ --}}
@extends('layouts.superadmin')

@section('title', 'Manage Accounts • Super Admin • Syllaverse')
@section('page-title', 'Manage Accounts')

@section('content')
<ul class="nav nav-tabs mb-4" id="accountTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="admins-tab" data-bs-toggle="tab" data-bs-target="#admins" type="button" role="tab">Admins</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="faculty-tab" data-bs-toggle="tab" data-bs-target="#faculty" type="button" role="tab">Faculty</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="students-tab" data-bs-toggle="tab" data-bs-target="#students" type="button" role="tab">Students</button>
    </li>
</ul>

<div class="tab-content">
    <!-- Admins Tab -->
    <div class="tab-pane fade show active" id="admins" role="tabpanel">
        <!-- Sub-tabs: Pending, Approved & Rejected -->
        <ul class="nav mb-4" id="adminsSubTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link sv-subtab active" id="admins-pending-tab"
                    data-bs-toggle="pill" data-bs-target="#admins-pending" type="button" role="tab">
                    Pending Requests
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link sv-subtab" id="admins-approved-tab"
                    data-bs-toggle="pill" data-bs-target="#admins-approved" type="button" role="tab">
                    Approved Admins
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link sv-subtab" id="admins-rejected-tab"
                    data-bs-toggle="pill" data-bs-target="#admins-rejected" type="button" role="tab">
                    Rejected Admins
                </button>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Pending Requests -->
            <div class="tab-pane fade show active" id="admins-pending" role="tabpanel">
                <div class="card border-0 shadow-sm p-4">
                    <div class="d-flex justify-content-start mb-4">
                        <div class="input-group" style="max-width: 300px;">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="search" class="form-control" placeholder="Search pending requests..." aria-label="Search pending requests">
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Loop through pending admin requests --}}
                            @foreach ($pendingAdmins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <form method="POST" action="{{ route('superadmin.approve.admin', $admin->id) }}" class="d-inline">
                                        @csrf
                                        <button class="btn btn-success btn-sm">Approve</button>
                                    </form>
                                    <form method="POST" action="{{ route('superadmin.reject.admin', $admin->id) }}" class="d-inline ms-2">
                                        @csrf
                                        <button class="btn btn-danger btn-sm">Reject</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Approved Admins -->
            <div class="tab-pane fade" id="admins-approved" role="tabpanel">
                <div class="card border-0 shadow-sm p-4">
                    <div class="d-flex justify-content-start mb-4">
                        <div class="input-group" style="max-width: 300px;">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="search" class="form-control" placeholder="Search admins..." aria-label="Search admins">
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Loop through approved admins --}}
                            @foreach ($approvedAdmins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <form method="POST" action="{{ route('superadmin.reject.admin', $admin->id) }}" class="d-inline">
                                        @csrf
                                        <button class="btn btn-danger btn-sm">Revoke</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Rejected Admins -->
            <div class="tab-pane fade" id="admins-rejected" role="tabpanel">
                <div class="card border-0 shadow-sm p-4">
                    <div class="d-flex justify-content-start mb-4">
                        <div class="input-group" style="max-width: 300px;">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="search" class="form-control" placeholder="Search rejected admins..." aria-label="Search rejected admins">
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Loop through rejected admins --}}
                            @foreach ($rejectedAdmins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <form method="POST" action="{{ route('superadmin.approve.admin', $admin->id) }}" class="d-inline">
                                        @csrf
                                        <button class="btn btn-primary btn-sm">Re-approve</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Faculty Tab -->
    <div class="tab-pane fade" id="faculty" role="tabpanel">
        <div class="card border-0 shadow-sm p-4">
            <div class="d-flex justify-content-start mb-4">
                <div class="input-group" style="max-width: 300px;">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="search" class="form-control" placeholder="Search faculty..." aria-label="Search faculty">
                </div>
            </div>
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop through faculty --}}
                    @foreach ($faculty as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{-- Add actions if needed --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Students Tab -->
    <div class="tab-pane fade" id="students" role="tabpanel">
        <div class="card border-0 shadow-sm p-4">
            <div class="d-flex justify-content-start mb-4">
                <div class="input-group" style="max-width: 300px;">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="search" class="form-control" placeholder="Search students..." aria-label="Search students">
                </div>
            </div>
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop through students --}}
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            {{-- Add actions if needed --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
