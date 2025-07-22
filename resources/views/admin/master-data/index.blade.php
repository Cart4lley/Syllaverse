{{-- 
------------------------------------------------
* File: resources/views/admin/master-data/index.blade.php
* Description: Admin Master Data Page with separate sections for SO/ILO and Program/Course (Syllaverse)
------------------------------------------------ 
--}}
@extends('layouts.admin')

@section('title', 'Master Data • Admin • Syllaverse')
@section('page-title', 'Master Data')

@section('content')
<div class="container">
    {{-- Main Tabs --}}
    <ul class="nav nav-pills mb-4" id="mainMasterTabs" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="soilo-tab" data-bs-toggle="pill" data-bs-target="#soilo" type="button" role="tab">
                Student & Intended Learning Outcomes
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="programcourse-tab" data-bs-toggle="pill" data-bs-target="#programcourse" type="button" role="tab">
                Programs & Courses
            </button>
        </li>
    </ul>

    <div class="tab-content" id="mainMasterTabsContent">
        {{-- SO & ILO Section --}}
        <div class="tab-pane fade show active" id="soilo" role="tabpanel">
            <ul class="nav nav-tabs mb-3" id="soIloSubTabs" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="so-tab" data-bs-toggle="tab" data-bs-target="#so" type="button" role="tab">
                        Student Outcomes (SO)
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="ilo-tab" data-bs-toggle="tab" data-bs-target="#ilo" type="button" role="tab">
                        Intended Learning Outcomes (ILO)
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="soIloTabContent">
                <div class="tab-pane fade show active" id="so" role="tabpanel">@include('admin.master-data.tabs.so')</div>
                <div class="tab-pane fade" id="ilo" role="tabpanel">@include('admin.master-data.tabs.ilo')</div>
            </div>
        </div>

        {{-- Program & Course Section --}}
        <div class="tab-pane fade" id="programcourse" role="tabpanel">
            <ul class="nav nav-tabs mb-3" id="progCourseSubTabs" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="programs-tab" data-bs-toggle="tab" data-bs-target="#programs" type="button" role="tab">
                        Programs
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="courses-tab" data-bs-toggle="tab" data-bs-target="#courses" type="button" role="tab">
                        Courses
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="progCourseTabContent">
                <div class="tab-pane fade show active" id="programs" role="tabpanel">@include('admin.master-data.tabs.programs-tab')</div>
                <div class="tab-pane fade" id="courses" role="tabpanel">@include('admin.master-data.tabs.courses-tab')</div>
            </div>
        </div>
    </div>
</div>

{{-- Modals --}}
@include('admin.master-data.modals.add-program-modal')
@include('admin.master-data.modals.edit-program-modal')
@include('admin.master-data.modals.add-course-modal')
@include('admin.master-data.modals.edit-course-modal')
@endsection

@push('scripts')
    @vite('resources/js/admin/academic-structure.js')
@endpush
