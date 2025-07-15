// File: public/js/admin/academic-structure.js
// Description: Handles modal form population for editing programs and courses in Admin Academic Structure (Syllaverse)

// ✅ Make functions accessible globally
window.setEditProgram = function(button) {
    const id = button.getAttribute('data-id');
    const name = button.getAttribute('data-name');
    const code = button.getAttribute('data-code');
    const description = button.getAttribute('data-description');

    document.getElementById('editProgramName').value = name;
    document.getElementById('editProgramCode').value = code;
    document.getElementById('editProgramDescription').value = description;
    document.getElementById('editProgramForm').action = '/admin/programs/' + id;
};

window.loadProgramCourses = function(button) {
    const programId = button.getAttribute('data-program-id');
    const programName = button.getAttribute('data-program-name');

    const inputField = document.getElementById('mapCourseFormProgramId');
    const labelField = document.getElementById('programCoursesProgramName');
    const debug = document.getElementById('debugProgramId');
    const mapButton = document.querySelector('#mapCourseForm button[type="submit"]');

    if (!inputField) console.error("❌ inputField not found");
    if (!labelField) console.error("❌ labelField not found");
    if (!mapButton) console.error("❌ mapButton not found");

    if (programId && inputField && labelField) {
        inputField.value = programId;
        labelField.textContent = programName;

        if (debug) debug.textContent = programId;
        if (mapButton) mapButton.disabled = false;
    } else {
        console.warn("⚠️ Missing required DOM elements or attributes.");
    }
};

window.setEditCourse = function(button) {
    const id = button.getAttribute('data-id');
    const code = button.getAttribute('data-code');
    const title = button.getAttribute('data-title');
    const lec = button.getAttribute('data-units_lec');
    const lab = button.getAttribute('data-units_lab');
    const description = button.getAttribute('data-description');

    document.getElementById('editCourseCode').value = code;
    document.getElementById('editCourseTitle').value = title;
    document.getElementById('editCourseLec').value = lec;
    document.getElementById('editCourseLab').value = lab;
    document.getElementById('editCourseDescription').value = description;
    document.getElementById('editCourseForm').action = '/admin/courses/' + id;
};

// ✅ Local scope code for DOM logic
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('mapCourseForm');
    const programIdField = document.getElementById('mapCourseFormProgramId');
    const mapButton = document.querySelector('#mapCourseForm button[type="submit"]');

    if (mapButton) {
        mapButton.disabled = true;
    }

    if (form) {
        form.addEventListener('submit', function (e) {
            const pid = programIdField.value.trim();
            if (!pid || pid === "") {
                alert("❌ Error: Program ID is missing!\nPlease click the 'Manage Courses' button for the correct program again before submitting.");
                e.preventDefault();
                return false;
            }
        });
    } else {
        console.warn("⚠️ mapCourseForm not found on page.");
    }
});
