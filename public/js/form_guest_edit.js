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
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    window.location.href = '/guests';
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