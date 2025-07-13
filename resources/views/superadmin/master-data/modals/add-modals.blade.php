{{-- ------------------------------------------------
* File: resources/views/superadmin/master-data/modals/add-modals.blade.php
* Description: Modals for adding new SDG, IGA, SO, and CDIO entries
------------------------------------------------ --}}

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
