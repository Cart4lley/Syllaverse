{{-- 
------------------------------------------------
* File: resources/views/admin/complete-profile.blade.php
* Description: Admin Profile Completion Form (Syllaverse)
------------------------------------------------ 
--}}

@extends('layouts.admin') {{-- Or your layout file --}}
@section('title', 'Complete Profile')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">Complete Your Profile</h4>
                </div>

                <div class="card-body">
                    @if (session('info'))
                        <div class="alert alert-warning">{{ session('info') }}</div>
                    @endif

                    <form action="{{ route('admin.submit-profile') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" id="fullname" class="form-control" value="{{ $user->name }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                            <input type="text" name="designation" id="designation" class="form-control" value="{{ old('designation', $user->designation) }}" required>
                            @error('designation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="employee_code" class="form-label">Employee Code <span class="text-danger">*</span></label>
                            <input type="text" name="employee_code" id="employee_code" class="form-control" value="{{ old('employee_code', $user->employee_code) }}" required>
                            @error('employee_code')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-danger w-100">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
