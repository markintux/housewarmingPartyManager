$(document).ready(function() {
    $('#createGuestForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/guests',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    window.location.reload();
                });
            },
            error: function (xhr) {
                $('#resultMessage').html('<div class="alert alert-danger">Error saving guest!</div>');

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