$(document).ready(function() {
    // submitSelection button
    $('#submitSelection').on('click', function(e) {
        e.preventDefault();

        let formData = new FormData($('#giftsForm')[0]);

        $.ajax({
            url: '/gifts/choose',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: 'Thank you! Your selection was successful!',
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    window.location.reload();
                });
            },
            error: function(xhr) {
                let errorMsg = xhr.responseJSON?.message || 'An error occurred, please try again.';
                $('#resultMessage').removeClass('d-none alert-success').addClass('alert-danger').text(errorMsg);
            }
        });
    });
    // submitRemember button
    $('#submitRemember').on('click', function(e) {
        e.preventDefault();

        let guestCode = $('#guest_code_remember').val();

        if(!guestCode){
            $('#resultMessageRemember').removeClass('d-none alert-success').addClass('alert-danger').text('Please enter your guest code.');
            return;
        }

        $.ajax({
            url: '/gifts/remember/' + guestCode,
            type: 'GET',
            success: function(response) {
                let gifts = response.gifts;
                let guest = response.guest;
                let giftsList = '';

                if(gifts.length === 0){
                    giftsList = '<p>No gifts found for this code.</p>';
                }else{
                    giftsList = '<p>Hi ' + guest.name + '!</p>';
                    giftsList += '<p>We have listed your chosen gifts below:</p>';
                    giftsList += '<ul>';
                    gifts.forEach(function(gift) {
                        giftsList += '<li><img src="/storage/' + gift.gift_image +'" alt="' + gift.gift + '" style="width: 100px; height: auto;">' + gift.gift + '</li>';
                    });
                    giftsList += '</ul>';
                }

                $('#giftsList').html(giftsList);
                $('#giftsModal').modal('show');
                $('#resultMessageRemember').addClass('d-none');
            },
            error: function(xhr) {
                if(xhr.status === 404){
                    $('#resultMessageRemember').removeClass('d-none alert-success').addClass('alert-danger').text('No gifts found for this guest code.');
                }else{
                    $('#resultMessageRemember').removeClass('d-none alert-success').addClass('alert-danger').text('An unexpected error occurred.');
                }
            }
        });
    });
});