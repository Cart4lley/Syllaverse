{{-- ------------------------------------------------
* File: resources/views/superadmin/departments.blade.php
* Description: Super Admin Departments Page (Syllaverse)
------------------------------------------------ --}}
@extends('layouts.superadmin')

@section('title', 'Departments • Super Admin • Syllaverse')
@section('page-title', 'Departments')

@section('content')
<div class="card border-0 shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h6 class="fw-bold text-secondary mb-0">Department List</h6>
        <button class="btn btn-danger d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addDepartmentModal">
            <i class="bi bi-plus-circle"></i> Add Department
        </button>
    </div>

    <div class="d-flex justify-content-start mb-4">
        <div class="input-group" style="max-width: 300px;">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="search" class="form-control" placeholder="Search departments..." aria-label="Search departments">
        </div>
    </div>

    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Department Name</th>
                <th>Department Code</th>
                <th>Created By</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>College of Informatics and Computing Sciences</td>
                <td>CICS</td>
                <td>Super Admin</td>
                <td>2025-06-22</td>
                <td>
                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal: Add Department (UI Only) -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" id="addDepartmentModalLabel">Add Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="departmentName" class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="departmentName" placeholder="Enter full department name">
                    </div>
                    <div class="mb-3">
                        <label for="departmentCode" class="form-label">Department Code</label>
                        <input type="text" class="form-control" id="departmentCode" placeholder="e.g., CICS">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
