{{-- ------------------------------------------------
* File: resources/views/superadmin/manage-accounts/tabs/admins-pending.blade.php
* Description: Pending Admin Requests Tab (Syllaverse)
------------------------------------------------ --}}
<div class="tab-pane fade show active" id="admins-pending" role="tabpanel">
    <div class="card border-0 shadow-sm p-4">
        <div class="d-flex justify-content-start mb-4">
            <div class="input-group" style="max-width: 300px;">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="search" class="form-control" placeholder="Search pending requests..." aria-label="Search pending requests">
            </div>
        </div>

        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pendingAdmins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            <form method="POST" action="{{ route('superadmin.approve.admin', $admin->id) }}" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm">Approve</button>
                            </form>
                            <form method="POST" action="{{ route('superadmin.reject.admin', $admin->id) }}" class="d-inline ms-2">
                                @csrf
                                <button class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-muted text-center">No pending admin requests found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
