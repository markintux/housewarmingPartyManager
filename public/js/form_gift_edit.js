$(document).ready(function() {
    $('#editGiftForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        var giftId = $('#gift_id').val();
        var url = "/gifts/" + giftId;

        $.ajax({
            type: 'PUT',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#resultMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                setTimeout(function() {
                    window.location.href = '/gifts';
                }, 2000);
            },
            error: function(xhr) {
                $('#resultMessage').html('<div class="alert alert-danger">Error saving gift!</div>');
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