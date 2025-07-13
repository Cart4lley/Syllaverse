{{-- ------------------------------------------------
* File: resources/views/superadmin/master-data/index.blade.php
* Description: Super Admin Master Data Page (Modularized)
------------------------------------------------ --}}
@extends('layouts.superadmin')

@section('title', 'Master Data • Super Admin • Syllaverse')
@section('page-title', 'Master Data')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- Main Tabs --}}
<ul class="nav nav-tabs mb-4" id="mainMasterTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="skills-tab" data-bs-toggle="tab" data-bs-target="#masterdata" type="button" role="tab">Skills and Outcomes</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab">Information</button>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade show active" id="masterdata" role="tabpanel">
        @include('superadmin.master-data.tabs.skills-outcomes')
    </div>
    @include('superadmin.master-data.tabs.information')
</div>

@include('superadmin.master-data.modals.add-modals')
@endsection
