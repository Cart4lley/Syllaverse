{{-- 
------------------------------------------------
* File: resources/views/admin/master-data/index.blade.php
* Description: Admin Master Data Page to manage SO and ILO (Syllaverse)
------------------------------------------------ 
--}}
@extends('layouts.admin')

@section('title', 'Master Data • Admin • Syllaverse')
@section('page-title', 'Master Data')

@section('content')
<div class="container">
    <ul class="nav nav-tabs mb-4" id="masterDataTabs" role="tablist">
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

    <div class="tab-content" id="masterDataTabContent">
        <div class="tab-pane fade show active" id="so" role="tabpanel">@include('admin.master-data.tabs.so')</div>
        <div class="tab-pane fade" id="ilo" role="tabpanel">@include('admin.master-data.tabs.ilo')</div>
    </div>
</div>
@endsection
