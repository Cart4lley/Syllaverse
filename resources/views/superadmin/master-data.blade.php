{{-- ------------------------------------------------
* File: resources/views/superadmin/master-data.blade.php
* Description: Super Admin Master Data Page (Syllaverse)
------------------------------------------------ --}}
@extends('layouts.superadmin')

@section('title', 'Master Data • Super Admin • Syllaverse')
@section('page-title', 'Master Data')

@section('content')
<ul class="nav nav-tabs mb-4" id="mainMasterTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="skills-tab" data-bs-toggle="tab" data-bs-target="#masterdata" type="button" role="tab">Skills and Outcomes</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab">Information</button>
    </li>
</ul>

<div class="tab-content">
    <!-- Skills and Outcomes Tab -->
    <div class="tab-pane fade show active" id="masterdata" role="tabpanel">
        <!-- Sub-tabs: SDG, ILO, IGA, SO, CDIO -->
        <ul class="nav mb-4" id="masterDataSubTabs" role="tablist">
            @foreach (['sdg' => 'SDG', 'iga' => 'IGA', 'so' => 'SO', 'cdio' => 'CDIO'] as $id => $label)
                <li class="nav-item">
                    <button class="nav-link sv-subtab @if ($loop->first) active @endif" id="{{ $id }}-tab"
                        data-bs-toggle="pill" data-bs-target="#{{ $id }}" type="button" role="tab">
                        {{ $label }}
                    </button>
                </li>
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach ([
                'sdg' => 'Sustainable Development Goals',
                'ilo' => 'Intended Learning Outcomes',
                'iga' => 'Institutional Graduate Attributes',
                'so'  => 'Student Outcomes',
                'cdio'=> 'Conceive-Design-Implement-Operate'
            ] as $id => $label)
                <div class="tab-pane fade @if ($loop->first) show active @endif" id="{{ $id }}" role="tabpanel">
                    <div class="card border-0 shadow-sm p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-bold text-danger mb-0">{{ $label }}</h6>
                            @php
                                $acronym = strtoupper($id);
                            @endphp
                            <button class="btn btn-sm btn-danger d-flex align-items-center gap-2">
                                <i class="bi bi-plus-circle"></i> Add {{ $acronym }}
                            </button>
                        </div>
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Sample {{ $label }} description</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Information Tab -->
    <div class="tab-pane fade" id="info" role="tabpanel">
        <div class="card border-0 shadow-sm p-4">
            <h6 class="fw-bold text-danger mb-3">General Academic Information</h6>
            <p class="text-muted">This section includes institutional mission, vision, and course policies.</p>
        </div>
    </div>
</div>
@endsection
