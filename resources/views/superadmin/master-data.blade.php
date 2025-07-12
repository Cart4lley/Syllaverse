{{-- ------------------------------------------------
* File: resources/views/superadmin/master-data.blade.php
* Description: Super Admin Master Data Page (Syllaverse)
------------------------------------------------ --}}
@extends('layouts.superadmin')

@section('title', 'Master Data • Super Admin • Syllaverse')
@section('page-title', 'Master Data')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- ========== MAIN TABS ========== --}}
<ul class="nav nav-tabs mb-4" id="mainMasterTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="skills-tab" data-bs-toggle="tab" data-bs-target="#masterdata" type="button" role="tab">Skills and Outcomes</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab">Information</button>
    </li>
</ul>

<div class="tab-content">

    {{-- ========== SKILLS AND OUTCOMES TAB ========== --}}
    <div class="tab-pane fade show active" id="masterdata" role="tabpanel">
        {{-- Subtabs --}}
        <ul class="nav mb-4" id="masterDataSubTabs" role="tablist">
            @foreach (['sdg' => 'SDG', 'iga' => 'IGA', 'so' => 'SO', 'cdio' => 'CDIO'] as $id => $label)
                <li class="nav-item">
                    <button class="nav-link sv-subtab @if ($loop->first) active @endif" id="{{ $id }}-tab" data-bs-toggle="pill" data-bs-target="#{{ $id }}" type="button" role="tab">
                        {{ $label }}
                    </button>
                </li>
            @endforeach
        </ul>

        {{-- Subtab Content --}}
        <div class="tab-content">
            @foreach ([
                'sdg' => ['label' => 'Sustainable Development Goals', 'items' => $sdgs],
                'iga' => ['label' => 'Institutional Graduate Attributes', 'items' => $igas],
                'so'  => ['label' => 'Student Outcomes', 'items' => $studentOutcomes],
                'cdio'=> ['label' => 'Conceive-Design-Implement-Operate', 'items' => $cdios]
            ] as $id => $data)
                <div class="tab-pane fade @if ($loop->first) show active @endif" id="{{ $id }}" role="tabpanel">
                    <div class="card border-0 shadow-sm p-4 mb-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-bold text-danger mb-0">{{ $data['label'] }}</h6>
                            <button class="btn btn-sm btn-danger d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#add{{ ucfirst($id) }}Modal" title="Add new {{ strtoupper($id) }}">
                                <i class="bi bi-plus-circle"></i> Add {{ strtoupper($id) }}
                            </button>
                        </div>

                        {{-- Table --}}
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data['items'] as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->title ?? '-' }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td class="d-flex gap-2">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#edit{{ ucfirst($id) }}Modal{{ $item->id }}" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <form action="{{ route('superadmin.master-data.destroy', [$id, $item->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- Edit Modal --}}
                                    <div class="modal fade" id="edit{{ ucfirst($id) }}Modal{{ $item->id }}" tabindex="-1" aria-labelledby="edit{{ ucfirst($id) }}ModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('superadmin.master-data.update', [$id, $item->id]) }}" method="POST" class="edit-master-data-form">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title fw-semibold" id="edit{{ ucfirst($id) }}ModalLabel{{ $item->id }}">Edit {{ $label }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if(in_array($id, ['sdg', 'iga', 'cdio']))
                                                        <div class="mb-3">
                                                            <label for="edit-{{ $id }}-title-{{ $item->id }}" class="form-label">Title</label>
                                                            <input type="text" name="title" class="form-control" id="edit-{{ $id }}-title-{{ $item->id }}" value="{{ $item->title }}">
                                                        </div>
                                                        @endif
                                                        <div class="mb-3">
                                                            <label for="edit-{{ $id }}-description-{{ $item->id }}" class="form-label">Description</label>
                                                            <textarea name="description" class="form-control" id="edit-{{ $id }}-description-{{ $item->id }}" rows="3" required>{{ $item->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-light">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No data found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ========== INFORMATION TAB ========== --}}
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
</div>

{{-- ========== ADD MODALS ========== --}}
@foreach (['sdg' => 'SDG', 'iga' => 'IGA', 'so' => 'SO', 'cdio' => 'CDIO'] as $id => $label)
<div class="modal fade" id="add{{ ucfirst($id) }}Modal" tabindex="-1" aria-labelledby="add{{ ucfirst($id) }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('superadmin.master-data.store', $id) }}" method="POST" class="add-master-data-form">
                @csrf
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-semibold" id="add{{ ucfirst($id) }}ModalLabel">Add {{ $label }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(in_array($id, ['sdg', 'iga', 'cdio']))
                    <div class="mb-3">
                        <label for="{{ $id }}-title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="{{ $id }}-title">
                    </div>
                    @endif
                    <div class="mb-3">
                        <label for="{{ $id }}-description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="{{ $id }}-description" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
