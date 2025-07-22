{{-- ------------------------------------------------
* File: resources/views/admin/academic-structure/modals/add-course-modal.blade.php
* Description: Modal for adding a new course (with contact hours and prerequisites) – Syllaverse
------------------------------------------------ --}}
<div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.courses.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="addCourseModalLabel">Add New Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="courseCode" class="form-label">Course Code</label>
                    <input type="text" class="form-control" id="courseCode" name="code" required>
                </div>

                <div class="mb-3">
                    <label for="courseTitle" class="form-label">Course Title</label>
                    <input type="text" class="form-control" id="courseTitle" name="title" required>
                </div>

                <div class="mb-3 d-flex gap-3">
                    <div class="w-50">
                        <label for="courseLec" class="form-label">Lecture Units</label>
                        <input type="number" class="form-control" id="courseLec" name="units_lec" min="0" required>
                    </div>
                    <div class="w-50">
                        <label for="courseLab" class="form-label">Laboratory Units</label>
                        <input type="number" class="form-control" id="courseLab" name="units_lab" min="0">
                    </div>
                </div>

                <div class="mb-3 d-flex gap-3">
                    <div class="w-50">
                        <label for="contactHoursLec" class="form-label">Contact Hours (Lecture)</label>
                        <input type="number" class="form-control" id="contactHoursLec" name="contact_hours_lec" min="0" required>
                    </div>
                    <div class="w-50">
                        <label for="contactHoursLab" class="form-label">Contact Hours (Lab)</label>
                        <input type="number" class="form-control" id="contactHoursLab" name="contact_hours_lab" min="0">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="coursePrerequisites" class="form-label">Prerequisite(s)</label>
                    <select class="form-select" id="coursePrerequisites" name="prerequisite_ids[]" multiple>
                        @foreach($courses as $existingCourse)
                            <option value="{{ $existingCourse->id }}">{{ $existingCourse->code }} – {{ $existingCourse->title }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">You may select multiple prerequisites.</small>
                </div>

                <div class="mb-3">
                    <label for="courseDescription" class="form-label">Description (optional)</label>
                    <textarea class="form-control" id="courseDescription" name="description" rows="3"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Create Course</button>
            </div>
        </form>
    </div>
</div>
