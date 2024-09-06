$(document).ready(function() {
    $('#editUserForm').on('submit', function(e) {
        e.preventDefault();

        var userId = $('#user_id').val();
        var url = "/users/" + userId;

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
                    window.location.reload();
                });
            },
            error: function (xhr) {
                $('#resultMessage').html('<div class="alert alert-danger">Error saving user!</div>');
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