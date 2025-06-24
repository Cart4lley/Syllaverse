{{-- ------------------------------------------------
* File: resources/views/superadmin/manage-admins.blade.php
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
</ul>

<div class="tab-content">
    <!-- Admins Tab -->
    <div class="tab-pane fade show active" id="admins" role="tabpanel">
        <!-- Sub-tabs: Pending & Approved -->
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
                                <th>Department</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Loop through pending admin requests --}}
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
                                <th>Department</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Loop through approved admins --}}
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
                        <th>Department</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop through faculty --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
