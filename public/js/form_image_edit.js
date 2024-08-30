$(document).ready(function() {
    $('#editImageForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        var imageId = $('#image_id').val();
        var url = "/images/" + imageId;

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#resultMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                setTimeout(function() {
                    window.location.href = '/images';
                }, 2000);
            },
            error: function(xhr) {
                $('#resultMessage').html('<div class="alert alert-danger">Error saving image!</div>');
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