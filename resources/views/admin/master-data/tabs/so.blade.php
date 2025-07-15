{{-- 
------------------------------------------------
* File: resources/views/admin/master-data/tabs/so.blade.php
* Description: SO Tab Content (Admin Master Data) - Syllaverse
------------------------------------------------ 
--}}
<h5>Student Outcomes (SO)</h5>

<form method="POST" action="{{ route('admin.master-data.store', 'so') }}">
    @csrf
    <div class="mb-3">
        <input type="text" name="code" class="form-control" placeholder="SO Code (e.g., SO1)" required>
    </div>
    <div class="mb-3">
        <textarea name="description" class="form-control" placeholder="Description" required></textarea>
    </div>
    <button type="submit" class="btn btn-danger">Add SO</button>
</form>

<hr>

<ul class="list-group mt-3">
    @foreach ($studentOutcomes as $so)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $so->code }}</strong><br>{{ $so->description }}
            </div>
            <form method="POST" action="{{ route('admin.master-data.destroy', ['type' => 'so', 'id' => $so->id]) }}">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
