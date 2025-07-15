{{-- 
------------------------------------------------
* File: resources/views/admin/manage-accounts/tabs/approved.blade.php
* Description: Displays approved faculty accounts managed by the admin (Syllaverse)
------------------------------------------------ 
--}}

@if($approvedFaculty->isEmpty())
    <div class="alert alert-info">
        <i class="bi bi-person-check-fill me-2"></i> No approved faculty accounts found.
    </div>
@else
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($approvedFaculty as $faculty)
            <div class="col">
                <div class="card h-100 shadow-sm border-success">
                    <div class="card-body">
                        <h5 class="card-title text-success fw-semibold">{{ $faculty->name }}</h5>
                        <p class="mb-1"><strong>Email:</strong> {{ $faculty->email }}</p>
                        <p class="mb-1"><strong>Employee Code:</strong> {{ $faculty->employee_code }}</p>
                        <p class="mb-1"><strong>Designation:</strong> {{ $faculty->designation }}</p>
                        <p class="mb-1"><strong>Department ID:</strong> {{ $faculty->department_id }}</p>
                    </div>
                    <div class="card-footer small text-muted">
                        Approved Account
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
