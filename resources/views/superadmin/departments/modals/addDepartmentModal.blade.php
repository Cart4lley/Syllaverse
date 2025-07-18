<!-- 
    File: resources/views/superadmin/departments/modals/addDepartmentModal.blade.php
    Description: Modal for adding a department (Syllaverse restyled)
-->

<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content add-modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-semibold" id="addDepartmentModalLabel" style="font-family:'Poppins',sans-serif;">
                    Add Department
                </h5>
                <button type="button" class="btn-close custom-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('superadmin.departments.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="departmentName" class="form-label" style="font-weight:500;">Department Name</label>
                        <input type="text" class="form-control modal-input" id="departmentName" name="name" placeholder="Enter full department name" required>
                    </div>
                    <div class="mb-3">
                        <label for="departmentCode" class="form-label" style="font-weight:500;">Department Code</label>
                        <input type="text" class="form-control modal-input" id="departmentCode" name="code" placeholder="e.g., CICS" required>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn modal-cancel-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn modal-save-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
