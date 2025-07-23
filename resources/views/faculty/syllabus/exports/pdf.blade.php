{{-- 
File: resources/views/faculty/syllabus/exports/pdf.blade.php
Description: Printable PDF layout for exporting a syllabus (Syllaverse – CIS style)
--}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <style>
    body {
      font-family: Georgia, serif;
      font-size: 12px;
      line-height: 1.6;
      color: #000;
    }
    .header {
      text-align: center;
      margin-bottom: 10px;
    }
    .header .title {
      font-size: 14px;
      font-weight: bold;
    }
    .header .sub {
      font-size: 13px;
    }
    .section {
      margin-top: 20px;
    }
    .label {
      font-weight: bold;
      text-transform: uppercase;
      font-size: 13px;
      margin-bottom: 5px;
    }
    .text-block {
      border: 1px solid #999;
      padding: 10px;
      min-height: 80px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    .table td, .table th {
      border: 1px solid #999;
      padding: 6px;
      vertical-align: top;
    }
    .table th {
      text-align: left;
      width: 20%;
    }
  </style>
</head>
<body>

  {{-- HEADER --}}
  <div class="header">
    <div class="title">BATANGAS STATE UNIVERSITY</div>
    <div class="sub">The National Engineering University</div>
    <div class="sub">ARASOF–Nasugbu Campus</div>
    <div class="sub">COURSE INFORMATION SYLLABUS (CIS)</div>
  </div>

  {{-- SECTION I & II --}}
  <div class="section">
    <div class="label">I. Vision</div>
    <div class="text-block">
      {!! nl2br(e($syllabus->vision)) !!}
    </div>
  </div>

  <div class="section">
    <div class="label">II. Mission</div>
    <div class="text-block">
      {!! nl2br(e($syllabus->mission)) !!}
    </div>
  </div>

  {{-- SECTION III - SAMPLE --}}
  <div class="section">
    <div class="label">III. Course Information</div>
    <table class="table">
      <tr>
        <th>Course Title</th>
        <td>{{ $syllabus->course->title ?? 'N/A' }}</td>
      </tr>
      <tr>
        <th>Course Code</th>
        <td>{{ $syllabus->course->code ?? 'N/A' }}</td>
      </tr>
      <tr>
        <th>Program</th>
        <td>{{ $syllabus->program->name ?? 'N/A' }}</td>
      </tr>
      <tr>
        <th>Academic Year</th>
        <td>{{ $syllabus->academic_year }}</td>
      </tr>
      <tr>
        <th>Semester</th>
        <td>{{ $syllabus->semester }}</td>
      </tr>
      <tr>
        <th>Year Level</th>
        <td>{{ $syllabus->year_level }}</td>
      </tr>
    </table>
  </div>

</body>
</html>
