{{-- ------------------------------------------------
* File: resources/views/superadmin/manage-accounts/tabs/admins.blade.php
* Description: Admins tab with Pending, Approved, and Rejected sub-tabs (Syllaverse)
------------------------------------------------ --}}
<!-- Sub-tabs -->
<ul class="nav mb-4" id="adminsSubTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link sv-subtab active" id="admins-pending-tab" data-bs-toggle="pill" data-bs-target="#admins-pending" type="button" role="tab">
            Pending Requests
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link sv-subtab" id="admins-approved-tab" data-bs-toggle="pill" data-bs-target="#admins-approved" type="button" role="tab">
            Approved Admins
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link sv-subtab" id="admins-rejected-tab" data-bs-toggle="pill" data-bs-target="#admins-rejected" type="button" role="tab">
            Rejected Admins
        </button>
    </li>
</ul>

<!-- Sub-tab content areas -->
<div class="tab-content">
    @include('superadmin.manage-accounts.tabs.admins-pending')
    @include('superadmin.manage-accounts.tabs.admins-approved')
    @include('superadmin.manage-accounts.tabs.admins-rejected')
</div>
