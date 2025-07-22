{{-- ------------------------------------------------
* File: resources/views/admin/academic-structure/tabs/programs-tab.blade.php
* Description: Tab content for Program List (Admin Academic Structure) – no course mapping
------------------------------------------------ --}}
<div class="tab-pane fade show active" id="programs" role="tabpanel">
    <div class="card border-0 shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h6 class="fw-bold text-secondary mb-0">Program List</h6>

            @if (Auth::user()->department_id !== null)
                <button class="btn btn-danger d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addProgramModal">
                    <i class="bi bi-plus-circle"></i> Add Program
                </button>
            @else
                <button class="btn btn-secondary d-flex align-items-center gap-2" disabled>
                    <i class="bi bi-lock"></i> Add Program
                </button>
            @endif
        </div>

        {{-- Success & Error Messages --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Search --}}
        <div class="d-flex justify-content-start mb-4">
            <div class="input-group" style="max-width: 300px;">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="search" class="form-control" placeholder="Search programs..." aria-label="Search programs">
            </div>
        </div>

        {{-- Table --}}
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Program Name</th>
                    <th>Program Code</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($programs as $index => $program)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $program->name }}</td>
                        <td>{{ $program->code }}</td>
                        <td>{{ $program->created_at->format('Y-m-d') }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProgramModal"
                                data-id="{{ $program->id }}"
                                data-name="{{ $program->name }}"
                                data-code="{{ $program->code }}"
                                data-description="{{ $program->description }}"
                                onclick="setEditProgram(this)">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="{{ route('admin.programs.destroy', $program->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">No programs found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
