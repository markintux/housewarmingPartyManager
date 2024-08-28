$(document).ready(function() {
    $('#guestsTable').DataTable({});

    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var confirmed = confirm('Tem certeza que deseja excluir este convidado?');
        if(confirmed){
            this.submit();
        }
    });
});