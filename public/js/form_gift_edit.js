$(document).ready(function() {

    $('#editGiftForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        var giftId = $('#gift_id').val();
        var url = "/gifts/" + giftId;

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    window.location.href = '/gifts';
                });
            },
            error: function(xhr) {
                $('#resultMessage').html('<div class="alert alert-danger">Error saving gift!</div>');
                var errors = xhr.responseJSON.errors;
                var errorHtml = '<div class="alert alert-danger">';
                $.each(errors, function (key, error) {
                    errorHtml += error[0];
                });
                errorHtml += '</div>';
                $('#resultMessage').html(errorHtml);
            }
        });
    });
});