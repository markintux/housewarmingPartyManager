$(document).ready(function(){
    $('#createGiftForm').on('submit', function(e){
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: '/gifts',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                $('#resultMessage').html('<div class="alert alert-success">'+response.success+'</div>');
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
            },
            error: function(response){
                $('#resultMessage').html('<div class="alert alert-danger">There was an error registering the gift.</div>');
            }
        });
    });
});