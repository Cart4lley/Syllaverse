{{-- 
------------------------------------------------
* File: resources/views/admin/master-data/tabs/ilo.blade.php
* Description: ILO Tab Content (Admin Master Data) - Syllaverse
------------------------------------------------ 
--}}
<h5>Intended Learning Outcomes (ILO)</h5>

<form method="POST" action="{{ route('admin.master-data.store', 'ilo') }}">
    @csrf
    <div class="mb-3">
        <input type="text" name="code" class="form-control" placeholder="ILO Code (e.g., ILO1)" required>
    </div>
    <div class="mb-3">
        <textarea name="description" class="form-control" placeholder="Description" required></textarea>
    </div>
    <button type="submit" class="btn btn-danger">Add ILO</button>
</form>

<hr>

<ul class="list-group mt-3">
    @foreach ($intendedLearningOutcomes as $ilo)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $ilo->code }}</strong><br>{{ $ilo->description }}
            </div>
            <form method="POST" action="{{ route('admin.master-data.destroy', ['type' => 'ilo', 'id' => $ilo->id]) }}">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
