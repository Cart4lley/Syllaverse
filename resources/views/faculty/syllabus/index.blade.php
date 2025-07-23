<?php

// File: resources/views/faculty/syllabus/index.blade.php
// Description: Displays list of syllabi as cards for faculty users with modal to create new syllabus (Syllaverse)

?>

@extends('layouts.faculty')

@section('content')
@include('faculty.syllabus.modals.create')

<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Your Syllabi</h3>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#selectSyllabusMetaModal">
      + Create Syllabus
    </button>
  </div>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if ($syllabi->isEmpty())
    <p class="text-muted">You haven't created any syllabi yet.</p>
  @else
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($syllabi as $syllabus)
        <div class="col">
          <a href="{{ route('faculty.syllabi.show', $syllabus->id) }}" class="text-decoration-none text-dark">
            <div class="card shadow-sm h-100">
              <div class="card-body">
                <h5 class="card-title">{{ $syllabus->title }}</h5>
                <p class="card-text mb-1">
                  <strong>Course:</strong> {{ $syllabus->course->code ?? '—' }} - {{ $syllabus->course->title ?? '' }}
                </p>
                <p class="card-text mb-1">
                  <strong>AY:</strong> {{ $syllabus->academic_year }}<br>
                  <strong>Semester:</strong> {{ $syllabus->semester }}
                </p>
                <p class="card-text text-muted small mt-2">Created on {{ $syllabus->created_at->format('F d, Y') }}</p>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  @endif
</div>
@endsection
