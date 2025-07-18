{{-- ------------------------------------------------
* File: resources/views/admin/academic-structure/tabs/courses-tab.blade.php
* Description: Tab content for Course List (Admin Academic Structure) – with contact hours and prerequisites
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

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Course Code</th>
                        <th>Title</th>
                        <th>Lec</th>
                        <th>Lab</th>
                        <th>Total Units</th>
                        <th>Contact Hrs</th>
                        <th>Prerequisites</th>
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
                                <span class="badge bg-light text-dark">{{ $course->contact_hours_lec }} Lec</span>
                                @if($course->contact_hours_lab)
                                    <span class="badge bg-light text-dark">{{ $course->contact_hours_lab }} Lab</span>
                                @endif
                            </td>
                            <td>
                                @if($course->prerequisites->count())
                                    @foreach($course->prerequisites as $prereq)
                                        <span class="badge bg-secondary">{{ $prereq->code }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted small">None</span>
                                @endif
                            </td>
                            <td class="d-flex gap-1">
                                {{-- ✅ EDIT BUTTON --}}
                                <button
                                    class="btn btn-sm btn-outline-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editCourseModal"
                                    data-id="{{ $course->id }}"
                                    data-code="{{ $course->code }}"
                                    data-title="{{ $course->title }}"
                                    data-units_lec="{{ $course->units_lec }}"
                                    data-units_lab="{{ $course->units_lab }}"
                                    data-description="{{ $course->description }}"
                                    data-contact_hours_lec="{{ $course->contact_hours_lec }}"
                                    data-contact_hours_lab="{{ $course->contact_hours_lab }}"
                                    data-prerequisites='@json($course->prerequisites->pluck("id"))'
                                    onclick="setEditCourse(this)">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                {{-- ❌ DELETE BUTTON --}}
                                <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="9" class="text-center text-muted">No courses found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
