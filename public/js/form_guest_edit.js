$(document).ready(function() {
    $('#editGuestForm').on('submit', function(e) {
        e.preventDefault();

        var guestId = $('#guest_id').val();
        var url = "/guests/" + guestId;

        $.ajax({
            url: url,
            type: 'PUT',
            data: $(this).serialize(),
            success: function (response) {
                $('#resultMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                setTimeout(function() {
                    window.location.href = '/guests';
                }, 2000);
            },
            error: function (xhr) {
                $('#resultMessage').html('<div class="alert alert-danger">Error saving guest!</div>');
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