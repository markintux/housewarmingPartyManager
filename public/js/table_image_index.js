$(document).ready(function() {
    $('#imagesTable').DataTable({});

    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var confirmed = confirm('Are you sure you want to delete this image?');
        if(confirmed){
            this.submit();
        }
    });
});