$(document).ready(function() {
    $('#submitBtn').click(function() {
        // Collect form data
        const name = $('#name').val();
        const email = $('#email').val();
        const phone = $('#phone').val();
        const dob = $('#dob').val();
        const gender = $('#gender').val();

        // Simple validation check
        if (!name || !email || !phone || !dob || !gender) {
            alert('Please fill out all fields.');
            return;
        }

        // Send data to the server
        $.ajax({
            url: 'Process.php',
            type: 'POST',
            data: {
                name: name,
                email: email,
                phone: phone,
                dob: dob,
                gender: gender
            },
            success: function(response) {
                // Display success message with data
                $('#registrationForm').addClass('hidden');
                $('#successMessage').removeClass('hidden');
                $('#displayData').html(response);
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });
});
