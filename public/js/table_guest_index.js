$(document).ready(function() {
    $('#guestsTable').DataTable({});

    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        Swal.fire({
            title: "Are you sure you want to delete this guest?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if(result.isConfirmed){
                Swal.fire({
                    title: "Deleted!",
                    text: "Your guest has been deleted.",
                    icon: "success"
                }).then((result) => {
                    this.submit();
                });
            }
        });
    });
});