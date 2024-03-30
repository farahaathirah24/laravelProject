// profile.js

$(document).ready(function() {
    // When the Edit button is clicked
    $('#editBtn').click(function() {
        // Hide the Edit button and show the Update and Cancel buttons
        $(this).addClass('d-none');
        $('#updateBtn, #cancelBtn').removeClass('d-none');

        // Make input fields editable
        $('#name, #email').prop('readonly', false);
    });

    // When the Cancel button is clicked
    $('#cancelBtn').click(function() {
        // Hide the Update and Cancel buttons and show the Edit button again
        $('#updateBtn, #cancelBtn').addClass('d-none');
        $('#editBtn').removeClass('d-none');

        // Revert input fields to their original (readonly) state
        $('#name, #email').prop('readonly', true);
    });
});
