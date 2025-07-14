{{-- ------------------------------------------------
* File: resources/views/superadmin/manage-accounts/tabs/admins-approved.blade.php
* Description: Approved Admins Tab (Syllaverse)
------------------------------------------------ --}}
<div class="tab-pane fade" id="admins-approved" role="tabpanel">
    <div class="card border-0 shadow-sm p-4">
        <div class="d-flex justify-content-start mb-4">
            <div class="input-group" style="max-width: 300px;">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="search" class="form-control" placeholder="Search admins..." aria-label="Search admins">
            </div>
        </div>
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($approvedAdmins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('superadmin.assign.department', $admin->id) }}" class="d-flex">
                            @csrf
                            <select name="department_id" class="form-select form-select-sm me-2" required>
                                <option value="">Select...</option>
                                @foreach ($departments as $dept)
                                    <option value="{{ $dept->id }}" {{ $admin->department_id === $dept->id ? 'selected' : '' }}>
                                        {{ $dept->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm">Assign</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('superadmin.reject.admin', $admin->id) }}" class="d-inline">
                            @csrf
                            <button class="btn btn-danger btn-sm">Revoke</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
