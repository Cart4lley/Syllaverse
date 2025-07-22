// File: public/js/admin/academic-structure.js
// Description: Handles modal form population for editing programs and courses (Syllaverse)

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

window.setEditCourse = function (button) {
    const id = button.getAttribute('data-id');
    const code = button.getAttribute('data-code');
    const title = button.getAttribute('data-title');
    const lec = button.getAttribute('data-units_lec');
    const lab = button.getAttribute('data-units_lab');
    const description = button.getAttribute('data-description');
    const contactLec = button.getAttribute('data-contact_hours_lec');
    const contactLab = button.getAttribute('data-contact_hours_lab');
    const prerequisites = JSON.parse(button.getAttribute('data-prerequisites') || '[]');

    // Fill form fields
    document.getElementById('editCourseForm').action = '/admin/courses/' + id;
    document.getElementById('editCourseCode').value = code;
    document.getElementById('editCourseTitle').value = title;
    document.getElementById('editCourseLec').value = lec;
    document.getElementById('editCourseLab').value = lab;
    document.getElementById('editCourseDescription').value = description || '';
    document.getElementById('editContactHoursLec').value = contactLec || 0;
    document.getElementById('editContactHoursLab').value = contactLab || '';

    const prereqSelect = document.getElementById('editCoursePrerequisites');
    if (prereqSelect) {
        // Remove the course itself from the dropdown
        Array.from(prereqSelect.options).forEach(opt => {
            if (parseInt(opt.value) === parseInt(id)) {
                opt.remove(); // ✅ Remove itself from the list
            }
        });

        // Re-run loop to apply selections
        Array.from(prereqSelect.options).forEach(opt => {
            opt.selected = prerequisites.includes(parseInt(opt.value));
        });
    }
};
