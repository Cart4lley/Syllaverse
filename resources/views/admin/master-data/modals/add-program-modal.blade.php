{{-- ------------------------------------------------
* File: resources/views/admin/academic-structure/modals/add-program-modal.blade.php
* Description: Modal for adding a new program (Syllaverse)
------------------------------------------------ --}}
<div class="modal fade" id="addProgramModal" tabindex="-1" aria-labelledby="addProgramModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.programs.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="addProgramModalLabel">Add New Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="programName" class="form-label">Program Name</label>
                    <input type="text" class="form-control" id="programName" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="programCode" class="form-label">Program Code</label>
                    <input type="text" class="form-control" id="programCode" name="code" required>
                </div>

                <div class="mb-3">
                    <label for="programDescription" class="form-label">Description (optional)</label>
                    <textarea class="form-control" id="programDescription" name="description" rows="3"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Create Program</button>
            </div>
        </form>
    </div>
</div>
