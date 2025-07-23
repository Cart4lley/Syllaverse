// 
// File: resources/js/faculty/syllabus.js
// Description: Change detection + exit confirmation logic for CIS-style syllabus (Syllaverse)
// 

let isDirty = false;

document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('#syllabusForm textarea').forEach(field => {
    field.addEventListener('input', () => isDirty = true);
  });
});

window.handleExit = function () {
  if (isDirty) {
    if (confirm("You have unsaved changes. Do you want to leave without saving?")) {
      window.location.href = syllabusExitUrl;
    }
  } else {
    window.location.href = syllabusExitUrl;
  }
};

window.addEventListener("beforeunload", function (e) {
  if (isDirty) {
    e.preventDefault();
    e.returnValue = '';
  }
});
