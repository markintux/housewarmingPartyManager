$(document).ready(function(){
    $('#createImageForm').on('submit', function(e){
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: '/images',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                $('#resultMessage').html('<div class="alert alert-success">'+response.message+'</div>');
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
            },
            error: function(response){
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