{{-- ------------------------------------------------
* File: resources/views/admin/academic-structure/tabs/courses-tab.blade.php
* Description: Tab content for Course List (Admin Academic Structure)
------------------------------------------------ --}}
<div class="tab-pane fade" id="courses" role="tabpanel">
    <div class="card border-0 shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h6 class="fw-bold text-secondary mb-0">Course List</h6>

            @if (Auth::user()->department_id !== null)
                <button class="btn btn-danger d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                    <i class="bi bi-plus-circle"></i> Add Course
                </button>
            @else
                <button class="btn btn-secondary d-flex align-items-center gap-2" disabled>
                    <i class="bi bi-lock"></i> Add Course
                </button>
            @endif
        </div>

        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Course Code</th>
                    <th>Title</th>
                    <th>Lec</th>
                    <th>Lab</th>
                    <th>Total Units</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $index => $course)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $course->code }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->units_lec }}</td>
                        <td>{{ $course->units_lab }}</td>
                        <td>{{ $course->total_units }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editCourseModal"
                                data-id="{{ $course->id }}" data-code="{{ $course->code }}" data-title="{{ $course->title }}"
                                data-units_lec="{{ $course->units_lec }}" data-units_lab="{{ $course->units_lab }}"
                                data-description="{{ $course->description }}" onclick="setEditCourse(this)">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">No courses found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
