<!-- 
    File: resources/views/superadmin/departments/modals/editDepartmentModal.blade.php
    Description: Modal for editing a department (Syllaverse restyled)
-->

<div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-labelledby="editDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content edit-modal-content">
            <form id="editDepartmentForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-semibold" id="editDepartmentModalLabel" style="font-family:'Poppins',sans-serif;">
                        Edit Department
                    </h5>
                    <button type="button" class="btn-close custom-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editDepartmentName" class="form-label" style="font-weight:500;">Department Name</label>
                        <input type="text" class="form-control modal-input" id="editDepartmentName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDepartmentCode" class="form-label" style="font-weight:500;">Department Code</label>
                        <input type="text" class="form-control modal-input" id="editDepartmentCode" name="code" required>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn modal-cancel-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn modal-save-btn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
