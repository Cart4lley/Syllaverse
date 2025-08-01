{{-- 
------------------------------------------------
* File: resources/views/admin/master-data/tabs/ilo.blade.php
* Description: ILO Tab Content (Admin Master Data) – with edit support
------------------------------------------------ 
--}}
<h5>Intended Learning Outcomes (ILO)</h5>

{{-- Course Filter --}}
<form method="GET" action="{{ route('admin.master-data.index') }}" class="mb-4">
    <div class="row g-2 align-items-center">
        <div class="col-md-6">
            <select name="course_id" class="form-select" onchange="this.form.submit()">
                <option value="">Select a Course</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->code }} - {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</form>

@if (request('course_id'))
    {{-- Add New ILO Form --}}
    <form method="POST" action="{{ route('admin.master-data.store', ['type' => 'ilo']) }}">
        @csrf
        <input type="hidden" name="course_id" value="{{ old('course_id', request('course_id')) }}">

        <div class="mb-3">
            <input type="text" name="code" class="form-control" placeholder="ILO Code (e.g., ILO1)" required value="{{ old('code') }}">
        </div>
        <div class="mb-3">
            <textarea name="description" class="form-control" placeholder="Description" required>{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-danger">Add ILO</button>
    </form>

    <hr>

    {{-- ILO List --}}
    <ul class="list-group mt-3">
        @forelse ($intendedLearningOutcomes as $ilo)
            <li class="list-group-item">
                <form method="POST" action="{{ route('admin.master-data.update', ['type' => 'ilo', 'id' => $ilo->id]) }}" class="row g-2 align-items-center">
                    @csrf @method('PUT')
                    <input type="hidden" name="course_id" value="{{ request('course_id') }}">
                    <div class="col-md-2">
                        <input type="text" name="code" class="form-control form-control-sm" value="{{ $ilo->code }}" required>
                    </div>
                    <div class="col-md-7">
                        <textarea name="description" class="form-control form-control-sm" rows="1" required>{{ $ilo->description }}</textarea>
                    </div>
                    <div class="col-md-3 d-flex gap-1 justify-content-end">
                        <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
                        <form method="POST" action="{{ route('admin.master-data.destroy', ['type' => 'ilo', 'id' => $ilo->id]) }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </form>
            </li>
        @empty
            <li class="list-group-item text-muted">No ILOs found for this course.</li>
        @endforelse
    </ul>
@else
    <p class="text-muted">Please select a course to manage its ILOs.</p>
@endif
    