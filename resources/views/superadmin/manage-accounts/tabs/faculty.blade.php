{{-- ------------------------------------------------
* File: resources/views/superadmin/manage-accounts/tabs/faculty.blade.php
* Description: Faculty Accounts Tab (Syllaverse)
------------------------------------------------ --}}
<div class="card border-0 shadow-sm p-4">
    <div class="d-flex justify-content-start mb-4">
        <div class="input-group" style="max-width: 300px;">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="search" class="form-control" placeholder="Search faculty..." aria-label="Search faculty">
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
            @foreach ($faculty as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
