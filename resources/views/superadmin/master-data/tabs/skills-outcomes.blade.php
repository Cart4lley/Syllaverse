{{-- ------------------------------------------------
* File: resources/views/superadmin/master-data/tabs/skills-outcomes.blade.php
* Description: Subtabs for SDG, IGA, CDIO including edit modals (SO removed)
------------------------------------------------ --}}

{{-- Subtabs --}}
<ul class="nav mb-4" id="masterDataSubTabs" role="tablist">
    @foreach (['sdg' => 'SDG', 'iga' => 'IGA', 'cdio' => 'CDIO'] as $id => $label)
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
                                                <h5 class="modal-title fw-semibold" id="edit{{ ucfirst($id) }}ModalLabel{{ $item->id }}">Edit {{ $data['label'] }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="edit-{{ $id }}-title-{{ $item->id }}" class="form-label">Title</label>
                                                    <input type="text" name="title" class="form-control" id="edit-{{ $id }}-title-{{ $item->id }}" value="{{ $item->title }}">
                                                </div>
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
