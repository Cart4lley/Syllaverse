{{-- 
File: resources/views/faculty/syllabus/partials/mission-vision.blade.php  
Description: Mission and Vision with smaller text, table format (CIS-style – Syllaverse) 
--}}

<table class="table table-bordered mb-4" style="font-family: Georgia, serif; font-size: 13px; line-height: 1.4;">
  <colgroup>
    <col style="width: 15%;">
    <col style="width: 85%;">
  </colgroup>
  <tbody>
    <tr>
      <th class="align-top text-start">Vision</th>
      <td>
        <textarea 
          name="vision" 
          class="form-control border-0 p-0 bg-transparent"
          style="min-height: 70px;"
          required>{{ old('vision', $default['vision'] ?? '') }}</textarea>
      </td>
    </tr>
    <tr>
      <th class="align-top text-start">Mission</th>
      <td>
        <textarea 
          name="mission" 
          class="form-control border-0 p-0 bg-transparent"
          style="min-height: 90px;"
          required>{{ old('mission', $default['mission'] ?? '') }}</textarea>
      </td>
    </tr>
  </tbody>
</table>
