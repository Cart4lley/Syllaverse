{{-- 
------------------------------------------------
* File: resources/views/admin/manage-accounts/tabs/pending.blade.php
* Description: Shows pending faculty accounts for approval (Syllaverse)
------------------------------------------------ 
--}}

@if($pendingFaculty->isEmpty())
    <div class="alert alert-info">
        <i class="bi bi-info-circle-fill me-2"></i> No pending faculty accounts in your department.
    </div>
@else
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($pendingFaculty as $faculty)
            <div class="col">
                <div class="card h-100 shadow-sm border-danger">
                    <div class="card-body">
                        <h5 class="card-title text-danger fw-semibold">{{ $faculty->name }}</h5>
                        <p class="mb-1"><strong>Email:</strong> {{ $faculty->email }}</p>
                        <p class="mb-1"><strong>Employee Code:</strong> {{ $faculty->employee_code }}</p>
                        <p class="mb-1"><strong>Designation:</strong> {{ $faculty->designation }}</p>
                        <p class="mb-1"><strong>Department ID:</strong> {{ $faculty->department_id }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <form method="POST" action="{{ route('admin.manage-accounts.approve', $faculty->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="bi bi-check-circle"></i> Approve
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.manage-accounts.reject', $faculty->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-x-circle"></i> Reject
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
