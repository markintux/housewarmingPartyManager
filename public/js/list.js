$(document).ready(function() {
    $('#giftsForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#resultMessage').removeClass('d-none alert-danger').addClass('alert-success').text(response.message);
            },
            error: function(xhr) {
                $('#resultMessage').removeClass('d-none alert-success').addClass('alert-danger').text('Error selecting gift(s).');
            }
        });
    });
});