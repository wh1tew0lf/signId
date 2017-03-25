'use strict';

$(function() {

    if ('undefined' === typeof Storage) {
        console.log('LocalStorage does not supported');
    } else {
        var token = localStorage.getItem('token');

        $.ajax({
            url: "api/index.php?action=me&token=" + token,
            type: "get",
            dataType: "json"
        }).then(function(data) {
            if (data.status) {
                console.error(data.message);
                alert(data.message);
            } else {
                $('.user-info .user-name h3').html('Hi, ' + data.user.firstName + '<a href="#" class="edit-btn"></a>');
                $('.user-info .user-email span').html(data.user.email + '<a href="#" class="edit-btn"></a>');
            }

        }).fail(function (error) {
            console.error(error);
            alert('Connection lost');
        });
    }
});