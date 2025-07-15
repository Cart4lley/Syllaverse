{{-- 
------------------------------------------------
* File: resources/views/admin/manage-accounts/index.blade.php
* Description: Admin Manage Faculty Accounts Page with tabbed layout (Syllaverse)
------------------------------------------------ 
--}}
@extends('layouts.admin')

@section('title', 'Manage Faculty Accounts • Admin • Syllaverse')
@section('page-title', 'Manage Faculty Accounts')

@section('content')

<ul class="nav nav-tabs mb-4" id="accountTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">
            Pending
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab">
            Approved
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab">
            Rejected
        </button>
    </li>
</ul>

<div class="tab-content" id="accountTabsContent">
    <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
        @include('admin.manage-accounts.tabs.pending')
    </div>
    <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
        @include('admin.manage-accounts.tabs.approved')
    </div>
    <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
        @include('admin.manage-accounts.tabs.rejected')
    </div>
</div>

@endsection
