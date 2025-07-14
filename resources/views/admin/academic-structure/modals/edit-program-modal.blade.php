{{-- ------------------------------------------------
* File: resources/views/admin/academic-structure/modals/edit-program-modal.blade.php
* Description: Modal for editing an existing program (Syllaverse)
------------------------------------------------ --}}
<div class="modal fade" id="editProgramModal" tabindex="-1" aria-labelledby="editProgramModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editProgramForm" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="editProgramModalLabel">Edit Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="editProgramName" class="form-label">Program Name</label>
                    <input type="text" class="form-control" id="editProgramName" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="editProgramCode" class="form-label">Program Code</label>
                    <input type="text" class="form-control" id="editProgramCode" name="code" required>
                </div>

                <div class="mb-3">
                    <label for="editProgramDescription" class="form-label">Description (optional)</label>
                    <textarea class="form-control" id="editProgramDescription" name="description" rows="3"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Program</button>
            </div>
        </form>
    </div>
</div>
