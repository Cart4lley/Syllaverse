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
        @include('admin.academic-structure.tabs.programs-tab')
        @include('admin.academic-structure.tabs.courses-tab')
    </div>

    {{-- Modals --}}
    @include('admin.academic-structure.modals.add-program-modal')
    @include('admin.academic-structure.modals.edit-program-modal')
    @include('admin.academic-structure.modals.add-course-modal')
    @include('admin.academic-structure.modals.edit-course-modal')
@endsection

@push('scripts')
    @vite('resources/js/admin/academic-structure.js')
@endpush
