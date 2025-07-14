{{-- ------------------------------------------------
* File: resources/views/superadmin/manage-accounts/tabs/students.blade.php
* Description: Student Accounts Tab (Syllaverse)
------------------------------------------------ --}}
<div class="card border-0 shadow-sm p-4">
    <div class="d-flex justify-content-start mb-4">
        <div class="input-group" style="max-width: 300px;">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="search" class="form-control" placeholder="Search students..." aria-label="Search students">
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
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
