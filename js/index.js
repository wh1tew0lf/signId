'use strict';

var app = {
    navigateByUrl: function (url) {
        document.location.href = url;
    },

    showMessageModal: function (message) {
        $('#login-email-verification').modal('hide');
        $('#sign-verification').find('.message').text(message);
        $('#sign-verification').modal('show');
    },

    checkPaper: function(uid) {
        var $this = this;
        $.ajax({
            url: "api/paper/" + uid,
            type: "get",
            dataType: "json"
        }).then(function(data) {
            if (data.paper.signed && data.paper.token) {
                if ('undefined' !== typeof Storage) {
                    localStorage.setItem('token', data.paper.token);
                }
                $this.navigateByUrl('dashboard.html');
            } else {
                if (!data.paper.expired) {
                    setTimeout($this.checkPaper.bind($this, uid), 650);
                } else {
                    $this.showMessageModal('Auth request expired. Try another time');
                }
            }
        });
    },

    onClick: function (event) {
        event.preventDefault();
        var $this = this;
        var email = $('#email').val();
        var post = {
            title: "SignInCloud Sign In",
            hash: Math.random().toString().substr(2),
            type: 1
        };
        if (email) {
            $.ajax({
                url: "api/user/" + email + "/paper",
                type: "post",
                data: post,
                dataType: "json"
            }).then(function (data) {
                if (data.status) {
                    $this.showMessageModal(data.message);
                } else if (data.uid) {
                    $this.checkPaper(data.uid);
                    $this.showMessageModal('Please Sign on device');
                }
            }).fail(function (error) {
                $this.showMessageModal('Connection lost');
                console.error(error);
            });
        }
    },

    init: function () {
        $('#sign-in-form').on('submit', this.onClick.bind(this));
        $('#sign-in').on('click', this.onClick.bind(this));
    }
};

$(function() {
    app.init();
});