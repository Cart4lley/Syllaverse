{{-- ------------------------------------------------
* File: resources/views/admin/academic-structure/index.blade.php
* Description: Admin Program & Course Management Page with Tabs (Syllaverse)
------------------------------------------------ --}}
@extends('layouts.admin')

@section('title', 'Academic Structure • Admin • Syllaverse')
@section('page-title', 'Academic Structure')

@section('content')

{{-- Department Check Notice --}}
@if (Auth::user()->department_id === null)
    <div class="alert alert-warning d-flex align-items-center gap-2 mb-4">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <div>You are not yet assigned to a department by the Super Admin. You cannot manage programs or courses until then.</div>
    </div>
@endif

{{-- Tabs --}}
<ul class="nav nav-tabs mb-4" id="academicTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="programs-tab" data-bs-toggle="tab" data-bs-target="#programs" type="button" role="tab">Programs</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="courses-tab" data-bs-toggle="tab" data-bs-target="#courses" type="button" role="tab">Courses</button>
    </li>
</ul>

<div class="tab-content" id="academicTabContent">
    {{-- Programs Tab --}}
    <div class="tab-pane fade show active" id="programs" role="tabpanel">
        <div class="card border-0 shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="fw-bold text-secondary mb-0">Program List</h6>

                @if (Auth::user()->department_id !== null)
                    <button class="btn btn-danger d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addProgramModal">
                        <i class="bi bi-plus-circle"></i> Add Program
                    </button>
                @else
                    <button class="btn btn-secondary d-flex align-items-center gap-2" disabled>
                        <i class="bi bi-lock"></i> Add Program
                    </button>
                @endif
            </div>

            {{-- Success & Error Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

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

            {{-- Search --}}
            <div class="d-flex justify-content-start mb-4">
                <div class="input-group" style="max-width: 300px;">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="search" class="form-control" placeholder="Search programs..." aria-label="Search programs">
                </div>
            </div>

            {{-- Table --}}
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Program Name</th>
                        <th>Program Code</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programs as $index => $program)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $program->name }}</td>
                            <td>{{ $program->code }}</td>
                            <td>{{ $program->created_at->format('Y-m-d') }}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProgramModal"
                                    data-id="{{ $program->id }}" data-name="{{ $program->name }}" data-code="{{ $program->code }}" data-description="{{ $program->description }}" onclick="setEditProgram(this)">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="{{ route('admin.programs.destroy', $program->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                                </form>
                                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#manageCoursesModal"
                                    data-program-id="{{ $program->id }}" data-program-name="{{ $program->name }}" onclick="loadProgramCourses(this)">
                                    <i class="bi bi-list-task"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">No programs found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Courses Tab --}}
    <div class="tab-pane fade" id="courses" role="tabpanel">
        <div class="card border-0 shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="fw-bold text-secondary mb-0">Course List</h6>

                @if (Auth::user()->department_id !== null)
                    <button class="btn btn-danger d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                        <i class="bi bi-plus-circle"></i> Add Course
                    </button>
                @else
                    <button class="btn btn-secondary d-flex align-items-center gap-2" disabled>
                        <i class="bi bi-lock"></i> Add Course
                    </button>
                @endif
            </div>

            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Course Code</th>
                        <th>Title</th>
                        <th>Lec</th>
                        <th>Lab</th>
                        <th>Total Units</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $index => $course)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $course->code }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->units_lec }}</td>
                            <td>{{ $course->units_lab }}</td>
                            <td>{{ $course->total_units }}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editCourseModal"
                                    data-id="{{ $course->id }}" data-code="{{ $course->code }}" data-title="{{ $course->title }}" data-units_lec="{{ $course->units_lec }}" data-units_lab="{{ $course->units_lab }}" data-description="{{ $course->description }}" onclick="setEditCourse(this)">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">No courses found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modals --}}
@include('admin.academic-structure.modals.add-program-modal')
@include('admin.academic-structure.modals.edit-program-modal')
@include('admin.academic-structure.modals.manage-program-courses-modal')
@include('admin.academic-structure.modals.add-course-modal')
@include('admin.academic-structure.modals.edit-course-modal')
@endsection

<script>
    function setEditProgram(button) {
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const code = button.getAttribute('data-code');
        const description = button.getAttribute('data-description');

        document.getElementById('editProgramName').value = name;
        document.getElementById('editProgramCode').value = code;
        document.getElementById('editProgramDescription').value = description;
        document.getElementById('editProgramForm').action = '/admin/programs/' + id;
    }

    function loadProgramCourses(button) {
        const programId = button.getAttribute('data-program-id');
        const programName = button.getAttribute('data-program-name');

        console.log('🔍 BUTTON CLICKED');
        console.log('🆔 programId:', programId);
        console.log('📛 programName:', programName);

        const inputField = document.getElementById('mapCourseFormProgramId');
        const labelField = document.getElementById('programCoursesProgramName');
        const debug = document.getElementById('debugProgramId');
        const mapButton = document.querySelector('#mapCourseForm button[type="submit"]');

        if (!inputField) console.error("❌ inputField not found");
        if (!labelField) console.error("❌ labelField not found");
        if (!mapButton) console.error("❌ mapButton not found");

        if (programId && inputField && labelField) {
            inputField.value = programId;
            labelField.textContent = programName;

            if (debug) debug.textContent = programId;
            if (mapButton) mapButton.disabled = false;
        } else {
            console.warn("⚠️ Missing required DOM elements or attributes.");
        }
    }

    function setEditCourse(button) {
        const id = button.getAttribute('data-id');
        const code = button.getAttribute('data-code');
        const title = button.getAttribute('data-title');
        const lec = button.getAttribute('data-units_lec');
        const lab = button.getAttribute('data-units_lab');
        const description = button.getAttribute('data-description');

        document.getElementById('editCourseCode').value = code;
        document.getElementById('editCourseTitle').value = title;
        document.getElementById('editCourseLec').value = lec;
        document.getElementById('editCourseLab').value = lab;
        document.getElementById('editCourseDescription').value = description;
        document.getElementById('editCourseForm').action = '/admin/courses/' + id;
    }

    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('mapCourseForm');
        const programIdField = document.getElementById('mapCourseFormProgramId');
        const mapButton = document.querySelector('#mapCourseForm button[type="submit"]');

        // Disable the submit button initially
        if (mapButton) {
            mapButton.disabled = true;
        }

        if (form) {
            form.addEventListener('submit', function (e) {
                const pid = programIdField.value.trim();
                console.log("📤 Attempting submission with Program ID:", pid);

                if (!pid || pid === "") {
                    alert("❌ Error: Program ID is missing!\nPlease click the 'Manage Courses' button for the correct program again before submitting.");
                    e.preventDefault();
                    return false;
                }
            });
        } else {
            console.warn("⚠️ mapCourseForm not found on page.");
        }
    });
</script>






