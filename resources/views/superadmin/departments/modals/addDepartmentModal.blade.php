<!-- // File: resources/views/superadmin/departments/modals/addDepartmentModal.blade.php
// Description: Modal for adding a department -->

<!-- Modal: Add Department -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" id="addDepartmentModalLabel">Add Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('superadmin.departments.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="departmentName" class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="departmentName" name="name" placeholder="Enter full department name" required>
                    </div>
                    <div class="mb-3">
                        <label for="departmentCode" class="form-label">Department Code</label>
                        <input type="text" class="form-control" id="departmentCode" name="code" placeholder="e.g., CICS" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
