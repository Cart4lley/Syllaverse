{{-- 
------------------------------------------------
* File: resources/views/faculty/dashboard.blade.php
* Dashboard landing page for Faculty (Syllaverse)
------------------------------------------------ 
--}}
@extends('layouts.faculty')

@section('title', 'Dashboard • Faculty • Syllaverse')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-4">
    {{-- Stat Card: Total Classes --}}
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="card-title text-muted">Total Classes</h6>
                <h3 class="fw-bold text-danger">0</h3>
            </div>
        </div>
    </div>

    {{-- Stat Card: Syllabi Submitted --}}
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="card-title text-muted">Syllabi Submitted</h6>
                <h3 class="fw-bold text-danger">0</h3>
            </div>
        </div>
    </div>

    {{-- Stat Card: Pending Reviews --}}
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="card-title text-muted">Pending Reviews</h6>
                <h3 class="fw-bold text-danger">0</h3>
            </div>
        </div>
    </div>
</div>
@endsection
