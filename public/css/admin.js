// Custom JavaScript for Admin functionalities

// Example: Implementing a confirmation dialog for deletions
document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('form[method="POST"][action*="destroy"]');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            const confirmed = confirm('Are you sure you want to delete this item?');
            if (!confirmed) {
                event.preventDefault();
            }
        });
    });
});
