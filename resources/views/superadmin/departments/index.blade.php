{{-- 
------------------------------------------------
* File: resources/views/superadmin/departments/index.blade.php
* Description: Manage Departments Page (mobile: cards, icon labels, larger actions, 1s hold-to-drag FAB) – Syllaverse
------------------------------------------------ 
--}}
@extends('layouts.superadmin')

@section('title', 'Departments • Super Admin • Syllaverse')
@section('page-title', 'Manage Departments')

@push('styles')
    @vite('resources/css/superadmin/departments.css')
@endpush

@section('content')
<div class="department-card">

    {{-- Alerts --}}
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

    {{-- Toolbar: Search & Add (desktop only) --}}
    <div class="toolbar mb-4">
        <div class="input-group">
            <span class="input-group-text"><i data-feather="search"></i></span>
            <input type="search" class="form-control" placeholder="Search departments..." aria-label="Search departments">
        </div>
        <button class="btn-brand btn-brand-sm d-none d-md-inline-flex"
            data-bs-toggle="modal"
            data-bs-target="#addDepartmentModal"
            aria-label="Add Department"
            title="Add Department">
            <i data-feather="plus"></i>
        </button>
    </div>

    {{-- Departments Table --}}
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th><i data-feather="hash"></i></th>
                    <th><i data-feather="briefcase"></i> Name</th>
                    <th><i data-feather="code"></i> Code</th>
                    <th><i data-feather="calendar"></i> Created On</th>
                    <th class="text-end"><i data-feather="more-vertical"></i></th>
                </tr>
            </thead>
            <tbody>
                @forelse($departments as $index => $department)
                <tr>
                    <td data-label-icon="hash">{{ $index + 1 }}</td>
                    <td data-label-icon="briefcase">{{ $department->name }}</td>
                    <td data-label-icon="code">{{ $department->code }}</td>
                    <td data-label-icon="calendar">{{ $department->created_at->format('Y-m-d') }}</td>
                    <td data-label-icon="more-vertical" class="text-end">
                        <button class="btn action-btn edit me-2"
                            data-bs-toggle="modal"
                            data-bs-target="#editDepartmentModal"
                            data-id="{{ $department->id }}"
                            data-name="{{ $department->name }}"
                            data-code="{{ $department->code }}"
                            aria-label="Edit {{ $department->name }}"
                            onclick="setEditDepartment(this)">
                            <i data-feather="edit"></i>
                        </button>
                        <button class="btn action-btn delete"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteDepartmentModal"
                            data-id="{{ $department->id }}"
                            aria-label="Delete {{ $department->name }}"
                            onclick="setDeleteDepartment(this)">
                            <i data-feather="trash"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-state">No departments available.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Floating Add button (mobile only, sticky & draggable FAB, placed OUTSIDE the card) --}}
<button class="btn-brand btn-brand-sm add-dept-fab d-md-none"
    id="draggableAddFab"
    data-bs-toggle="modal"
    data-bs-target="#addDepartmentModal"
    aria-label="Add Department"
    title="Add Department">
    <i data-feather="plus"></i>
</button>

{{-- Modals --}}
@include('superadmin.departments.modals.addDepartmentModal')
@include('superadmin.departments.modals.editDepartmentModal')
@include('superadmin.departments.modals.deleteDepartmentModal')
@endsection

@push('scripts')
<script>
    // Initialize Feather icons
    feather.replace();

    function setEditDepartment(button) {
        const id   = button.dataset.id;
        const name = button.dataset.name;
        const code = button.dataset.code;
        const form = document.getElementById('editDepartmentForm');

        form.action = `/superadmin/departments/${id}`;
        form.querySelector('#editDepartmentName').value = name;
        form.querySelector('#editDepartmentCode').value = code;
    }

    function setDeleteDepartment(button) {
        const id = button.dataset.id;
        document.getElementById('deleteDepartmentForm').action = `/superadmin/departments/${id}`;
    }

    // --- 1s hold to enter drag, instant drag, auto-exit draggable mode ---
    document.addEventListener("DOMContentLoaded", function() {
      const fab = document.getElementById("draggableAddFab");
      if (!fab) return;

      let offsetX = 0, offsetY = 0, isDragging = false, isDraggableMode = false, holdTimeout;
      let holdStarted = false;
      let dragStartEvent = null;

      // Hold for 1 second to enter draggable state and (if still holding) start dragging
      function onHoldStart(e) {
        if (e.type === 'mousedown' && e.button !== 0) return;

        holdStarted = true;
        dragStartEvent = e; // Remember original event
        holdTimeout = setTimeout(() => {
          isDraggableMode = true;
          fab.classList.add('draggable-mode');
          // If still holding, start dragging immediately!
          startDrag(dragStartEvent);
        }, 1000); // 1 second hold
      }
      function onHoldEnd(e) {
        clearTimeout(holdTimeout);
        holdStarted = false;
        dragStartEvent = null;
      }

      // Start dragging (only if in draggable mode)
      function startDrag(e) {
        if (!isDraggableMode) return;
        isDragging = true;
        fab.classList.add('dragging');
        const rect = fab.getBoundingClientRect();
        let clientX, clientY;
        if (e.type && e.type.startsWith('touch')) {
          clientX = e.touches[0].clientX;
          clientY = e.touches[0].clientY;
        } else if (e.type && (e.type === 'mousedown' || e.type === 'mousemove')) {
          clientX = e.clientX;
          clientY = e.clientY;
        } else if (e.clientX && e.clientY) {
          clientX = e.clientX;
          clientY = e.clientY;
        } else {
          return;
        }
        offsetX = clientX - rect.left;
        offsetY = clientY - rect.top;
        fab.setAttribute('data-bs-toggle', '');
        fab.setAttribute('data-bs-target', '');
      }

      function onDragMove(e) {
        if (!isDraggableMode || !isDragging) return;
        e.preventDefault();
        let x, y;
        if (e.type.startsWith('touch')) {
          x = e.touches[0].clientX;
          y = e.touches[0].clientY;
        } else {
          x = e.clientX;
          y = e.clientY;
        }
        const winW = window.innerWidth, winH = window.innerHeight;
        let left = Math.min(Math.max(0, x - offsetX), winW - fab.offsetWidth);
        let top = Math.min(Math.max(0, y - offsetY), winH - fab.offsetHeight);
        fab.style.left = left + "px";
        fab.style.top = top + "px";
        fab.style.right = "auto";
        fab.style.bottom = "auto";
      }

      function onDragEnd(e) {
        if (isDragging || isDraggableMode) {
          isDragging = false;
          isDraggableMode = false;
          fab.classList.remove('dragging');
          fab.classList.remove('draggable-mode');
          fab.setAttribute('data-bs-toggle', 'modal');
          fab.setAttribute('data-bs-target', '#addDepartmentModal');
        }
        clearTimeout(holdTimeout);
        holdStarted = false;
        dragStartEvent = null;
      }

      // Prevent modal if in draggable state
      fab.addEventListener('click', function(e) {
        if (isDraggableMode || isDragging || holdStarted) {
          e.preventDefault();
          e.stopPropagation();
        }
      });

      // --- Hold events for entering draggable mode ---
      fab.addEventListener('mousedown', onHoldStart);
      fab.addEventListener('touchstart', onHoldStart);
      fab.addEventListener('mouseup', onHoldEnd);
      fab.addEventListener('mouseleave', onHoldEnd);
      fab.addEventListener('touchend', onHoldEnd);

      // --- Drag events ---
      fab.addEventListener('mousedown', function(e) {
        if (isDraggableMode) startDrag(e);
      });
      fab.addEventListener('touchstart', function(e) {
        if (isDraggableMode) startDrag(e);
      });

      window.addEventListener('mousemove', onDragMove);
      window.addEventListener('touchmove', onDragMove);

      window.addEventListener('mouseup', onDragEnd);
      window.addEventListener('touchend', onDragEnd);
    });
</script>
@endpush
