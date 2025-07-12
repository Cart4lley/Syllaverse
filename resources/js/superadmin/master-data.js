// ------------------------------------------------
// File: public/js/superadmin/master-data.js
// Description: AJAX for Master Data Add & Edit Forms (Syllaverse)
// ------------------------------------------------

document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function handleFormAjax(form, modal) {
        const formData = new FormData(form);
        const action = form.getAttribute('action');
        const method = form.getAttribute('method') || 'POST';

        fetch(action, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            if (data.success || data.message || data.id) {
                if (modal) bootstrap.Modal.getInstance(modal).hide();
                setTimeout(() => location.reload(), 100);
            } else {
                alert('Something went wrong.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while saving.');
        });
    }

    document.querySelectorAll('.add-master-data-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            handleFormAjax(form, form.closest('.modal'));
        });
    });

    document.querySelectorAll('.edit-master-data-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            handleFormAjax(form, form.closest('.modal'));
        });
    });
});
