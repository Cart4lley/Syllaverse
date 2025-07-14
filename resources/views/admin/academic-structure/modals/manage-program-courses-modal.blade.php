{{-- ------------------------------------------------
* File: resources/views/admin/academic-structure/modals/manage-program-courses-modal.blade.php
* Description: Modal for managing course-to-program mappings (Syllaverse)
------------------------------------------------ --}}
<div class="modal fade" id="manageCoursesModal" tabindex="-1" aria-labelledby="manageCoursesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="mapCourseForm" method="POST" action="{{ route('admin.program-courses.store') }}" class="modal-content">
            @csrf
            <input type="hidden" name="program_id" id="mapCourseFormProgramId">

            <div class="modal-header">
                <h5 class="modal-title">Manage Courses for <span class="text-danger" id="programCoursesProgramName"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row g-3 align-items-end">
                    <div class="col-md-6">
                        <label for="course_id" class="form-label">Select Course</label>
                        <select class="form-select" id="course_id" name="course_id" required>
                            <option selected disabled>-- Choose Course --</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->code }} – {{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="year_level" class="form-label">Year Level</label>
                        <select class="form-select" id="year_level" name="year_level" required>
                            <option selected disabled>-- Select --</option>
                            @for($i = 1; $i <= 4; $i++)
                                <option value="{{ $i }}">{{ $i }} Year</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="semester" class="form-label">Semester</label>
                        <select class="form-select" id="semester" name="semester" required>
                            <option selected disabled>-- Select --</option>
                            <option value="1">1st Sem</option>
                            <option value="2">2nd Sem</option>
                            <option value="3">Summer</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-danger">Map Course</button>
                </div>

                <hr class="my-4">

                <h6 class="fw-bold mb-3">Mapped Courses</h6>
                <div class="table-responsive">
                    <table class="table table-bordered small mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Course</th>
                                <th>Year</th>
                                <th>Semester</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="programCourseList">
                            @foreach($programCourseMap as $map)
                                <tr>
                                    <td>{{ $map->course->code }} – {{ $map->course->title }}</td>
                                    <td>{{ $map->year_level }} Year</td>
                                    <td>
                                        @if($map->semester == 1) 1st Sem
                                        @elseif($map->semester == 2) 2nd Sem
                                        @else Summer
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.program-courses.destroy', $map->id) }}" method="POST" onsubmit="return confirm('Remove this course from the program?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-x"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if(count($programCourseMap) === 0)
                                <tr><td colspan="4" class="text-center text-muted">No courses mapped yet.</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                {{-- Debug Line: Remove later --}}
                <div class="mt-3">
                    <small class="text-muted">Program ID: <span id="debugProgramId"></span></small>
                </div>
            </div>
        </form>
    </div>
</div>
