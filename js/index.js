'use strict';

$(function() {

    function showMessageModal(message) {
        $('#login-email-verification').modal('hide');
        $('#sign-verification').find('.message').text(message);
        $('#sign-verification').modal('show');
    }

    function navigateByUrl(url) {
        document.location.href = url;
    }

    function checkPaper(uid) {
        $.ajax({
            url: "api/index.php?action=paper/" + uid,
            type: "get",
            dataType: "json"
        }).then(function(data) {
            if (data.signed && data.token) {
                console.log(data);
                if ('undefined' != typeof Storage) {
                    localStorage.setItem('token', data.token);
                }
                navigateByUrl('/dashboard.html');
            } else {
                setTimeout(checkPaper.bind(null, uid), 300);
            }
        });
    }

    $('#sign-in').on('click', function (event) {
        event.preventDefault();
        var email = $('#email').val();
        var post = {
            title: "SignInCloud Sign In",
            hash: Math.random(),
            type: 1
        };
        if (email) {
            $.ajax({
                url: "api/index.php?action=user/" + email + "/paper",
                type: "post",
                data: post,
                dataType: "json"
            }).then(function (data) {
                if (data.status) {
                    showMessageModal(data.message);
                } else if (data.uid) {
                    checkPaper(uid);
                    showMessageModal('Please Sign on device');
                    console.log(data);
                }
            }).fail(function (error) {
                showMessageModal('Connection lost');
                console.error(error);
            });
        }
    });
});