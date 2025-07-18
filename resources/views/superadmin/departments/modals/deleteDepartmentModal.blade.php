{{-- 
------------------------------------------------
* File: resources/views/superadmin/departments/modals/deleteDepartmentModal.blade.php
* Description: Delete Confirmation Modal for Departments – Syllaverse restyled
------------------------------------------------
--}}
<div class="modal fade" id="deleteDepartmentModal" tabindex="-1" aria-labelledby="deleteDepartmentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content delete-modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title text-danger d-flex align-items-center gap-2" id="deleteDepartmentModalLabel" style="font-family:'Poppins',sans-serif;">
          <i data-feather="trash-2"></i> Confirm Delete
        </h5>
        <button type="button" class="btn-close custom-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mb-0" style="font-family:'Poppins',sans-serif;">Are you sure you want to delete this department? This action cannot be undone.</p>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn modal-cancel-btn" data-bs-dismiss="modal">Cancel</button>
        <form id="deleteDepartmentForm" method="POST" action="">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn modal-delete-btn">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
