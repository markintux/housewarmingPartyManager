$(document).ready(function() {
    $('#giftsTable').DataTable({});

    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var confirmed = confirm('Are you sure you want to delete this gift?');
        if(confirmed){
            this.submit();
        }
    });
});