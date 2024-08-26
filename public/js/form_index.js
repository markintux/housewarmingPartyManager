$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: '/login',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#resultMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                window.location.href = response.redirectUrl;
            },
            error: function(xhr) {
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