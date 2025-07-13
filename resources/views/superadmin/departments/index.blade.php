{{-- ------------------------------------------------
* File: resources/views/superadmin/departments/index.blade.php
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

    {{-- Display Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Display Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departments as $index => $department)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->code }}</td>
                    <td>{{ $department->created_at->format('Y-m-d') }}</td>
                    <td>
                        <!-- Edit Button -->
                        <button 
                            class="btn btn-sm btn-outline-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#editDepartmentModal"
                            data-id="{{ $department->id }}"
                            data-name="{{ $department->name }}"
                            data-code="{{ $department->code }}"
                            onclick="setEditDepartment(this)"
                        >
                            <i class="bi bi-pencil"></i>
                        </button>
                        <!-- Delete Form -->
                        <form action="{{ route('superadmin.departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No departments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Modals --}}
@include('superadmin.departments.modals.addDepartmentModal')
@include('superadmin.departments.modals.editDepartmentModal')
@endsection

@push('scripts')
<script>
    function setEditDepartment(button) {
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const code = button.getAttribute('data-code');

        document.getElementById('editDepartmentName').value = name;
        document.getElementById('editDepartmentCode').value = code;
        document.getElementById('editDepartmentForm').action = '/superadmin/departments/' + id;
    }
</script>
@endpush
