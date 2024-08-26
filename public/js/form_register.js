$(document).ready(function() {
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/users',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                $('#resultMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                $('#registerForm')[0].reset();
            },
            error: function (xhr) {
                $('#resultMessage').html('<div class="alert alert-danger">Error saving user!</div>');

                var errors = xhr.responseJSON.errors;
                var errorHtml = '<div class="alert alert-danger">';
                $.each(errors, function (key, error) {
                    errorHtml += '<p>' + error[0] + '</p>';
                });
                errorHtml += '</div>';
                $('#resultMessage').html(errorHtml);
            }
        });
    });
});