{{-- 
------------------------------------------------
* File: resources/views/admin/manage-accounts/tabs/rejected.blade.php
* Description: Displays rejected faculty accounts under the admin's department (Syllaverse)
------------------------------------------------ 
--}}

@if($rejectedFaculty->isEmpty())
    <div class="alert alert-info">
        <i class="bi bi-person-dash-fill me-2"></i> No rejected faculty accounts found.
    </div>
@else
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($rejectedFaculty as $faculty)
            <div class="col">
                <div class="card h-100 shadow-sm border-secondary">
                    <div class="card-body">
                        <h5 class="card-title text-muted fw-semibold">{{ $faculty->name }}</h5>
                        <p class="mb-1"><strong>Email:</strong> {{ $faculty->email }}</p>
                        <p class="mb-1"><strong>Employee Code:</strong> {{ $faculty->employee_code }}</p>
                        <p class="mb-1"><strong>Designation:</strong> {{ $faculty->designation }}</p>
                        <p class="mb-1"><strong>Department ID:</strong> {{ $faculty->department_id }}</p>
                    </div>
                    <div class="card-footer small text-muted">
                        Rejected Account
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
