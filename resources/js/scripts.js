$(document).ready(function () {
    $('.del-contact-person-button-sw').click(function () {
        let token = $(this).data('token');
        let url = $(this).data('url');
        let customerId = $(this).data('id');

        Swal.fire({
            title: 'Biztosan törölni akarja?',
            icon: 'error',
            showCancelButton: true,
            cancelButtonText: 'Mégse',
            confirmButtonText: 'Törlés',
        }).then((result) => {
            if (result.isConfirmed) {
                sendDeleteRequest(url, token, customerId)
            }
        });
    });

    function sendDeleteRequest(url, token, customerId) {
        $.ajax({
            url: url,
            type: 'DELETE',
            data: {'_token': token},
            dataType: 'json',
            success: function (data) {
                alert(data.message);
                if (data.message) {
                    $('#customer-' + customerId).remove();
                }
            },
            onError: function (err) {
                console.log(err);
            }
        });
    }

    $('.button-delete-customer').click(function () {
        let token = $(this).data('token');
        let url = $(this).data('url');
        let customerId = $(this).data('id');
        if (url !== undefined) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {'_token': token},
                dataType: 'json',
                success: function (data) {
                    if (data.message) {
                        $('#customer-' + customerId).remove();
                        alert(data.message);
                    }
                },
                onerror: function (err) {
                    alert(err.error);
                }
                //  dataType: 'mycustomtype'
            });
        }
    });
});
