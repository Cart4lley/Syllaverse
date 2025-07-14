{{-- ------------------------------------------------
* File: resources/views/admin/academic-structure/modals/edit-course-modal.blade.php
* Description: Modal for editing a course (Syllaverse)
------------------------------------------------ --}}
<div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editCourseForm" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="editCourseCode" class="form-label">Course Code</label>
                    <input type="text" class="form-control" id="editCourseCode" name="code" required>
                </div>

                <div class="mb-3">
                    <label for="editCourseTitle" class="form-label">Course Title</label>
                    <input type="text" class="form-control" id="editCourseTitle" name="title" required>
                </div>

                <div class="mb-3 d-flex gap-3">
                    <div class="w-50">
                        <label for="editCourseLec" class="form-label">Lecture Units</label>
                        <input type="number" class="form-control" id="editCourseLec" name="units_lec" min="0" required>
                    </div>
                    <div class="w-50">
                        <label for="editCourseLab" class="form-label">Laboratory Units</label>
                        <input type="number" class="form-control" id="editCourseLab" name="units_lab" min="0" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="editCourseDescription" class="form-label">Description (optional)</label>
                    <textarea class="form-control" id="editCourseDescription" name="description" rows="3"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Course</button>
            </div>
        </form>
    </div>
</div>
