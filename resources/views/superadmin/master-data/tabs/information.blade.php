{{-- ------------------------------------------------
* File: resources/views/superadmin/master-data/tabs/information.blade.php
* Description: Information tab with general academic information fields
------------------------------------------------ --}}

<div class="tab-pane fade" id="info" role="tabpanel">
    <div class="card border-0 shadow-sm p-4">
        <h6 class="fw-bold text-danger mb-4">General Academic Information</h6>

        @foreach ([
            'mission' => 'Mission',
            'vision' => 'Vision',
            'policy' => 'Class Policy',
            'exams' => 'Missed Examinations',
            'dishonesty' => 'Academic Dishonesty',
            'dropping' => 'Dropping Students',
            'disability' => 'Students with Disabilities',
            'advising' => 'Consultation & Academic Advising',
        ] as $field => $label)
        <form action="{{ route('superadmin.general-info.update', ['section' => $field]) }}" method="POST" class="mb-4">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="{{ $field }}" class="form-label fw-semibold">{{ $label }}</label>
                <textarea class="form-control" name="{{ $field }}" id="{{ $field }}" rows="3" required>{{ $info[$field]->content ?? '' }}</textarea>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-outline-secondary btn-sm" title="Save {{ $label }}">
                    <i class="bi bi-save me-1"></i> Save
                </button>
            </div>
            <hr class="mt-4">
        </form>
        @endforeach
    </div>
</div>
