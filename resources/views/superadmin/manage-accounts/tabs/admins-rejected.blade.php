{{-- ------------------------------------------------
* File: resources/views/superadmin/manage-accounts/tabs/admins-rejected.blade.php
* Description: Rejected Admins Tab (Syllaverse)
------------------------------------------------ --}}
<div class="tab-pane fade" id="admins-rejected" role="tabpanel">
    <div class="card border-0 shadow-sm p-4">
        <div class="d-flex justify-content-start mb-4">
            <div class="input-group" style="max-width: 300px;">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="search" class="form-control" placeholder="Search rejected admins..." aria-label="Search rejected admins">
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
                @foreach ($rejectedAdmins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('superadmin.approve.admin', $admin->id) }}" class="d-inline">
                            @csrf
                            <button class="btn btn-primary btn-sm">Re-approve</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
