<!-- // File: resources/views/superadmin/departments/modals/editDepartmentModal.blade.php
// Description: Modal for editing a department -->

<!-- Modal: Edit Department -->
<div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-labelledby="editDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editDepartmentForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="editDepartmentModalLabel">Edit Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editDepartmentName" class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="editDepartmentName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDepartmentCode" class="form-label">Department Code</label>
                        <input type="text" class="form-control" id="editDepartmentCode" name="code" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
