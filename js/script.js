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

    loginFormSubmit: function (event) {
        event.preventDefault();
        var $this = this;
        var email = $('#email').val();
        var post = {
            title: "SignInCloud.com",
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
                    $this.showMessageModal('Please sign on your main device');
                }
            }).fail(function (error) {
                $this.showMessageModal('Connection lost');
                console.error(error);
            });
        }
    },


    disconnectDevice: function (event) {
        event.preventDefault();
        var uid = $(event.target).data('id');
        $.ajax({
            url: "api/me/device/" + uid + "/status",
            type: "put",
            data: {"status": 2},
            dataType: "json"
        }).then(function(data) {
            if (!data.status) {
                document.location.reload();
            } else {
                console.error(data.message);
                alert(data.message);
            }
        }).fail(function (error) {
            console.error(error);
            alert('Connection lost');
        });
    },

    connectDevice: function (event) {
        event.preventDefault();
        var uid = $(event.target).data('id');
        $.ajax({
            url: "api/me/device/" + uid + "/status",
            type: "put",
            data: {"status": 1},
            dataType: "json"
        }).then(function(data) {
            if (!data.status) {
                document.location.reload();
            } else {
                console.error(data.message);
                alert(data.message);
            }
        }).fail(function (error) {
            console.error(error);
            alert('Connection lost');
        });
    },

    makeMainDevice: function (event) {
        event.preventDefault();
        var uid = $(event.target).data('id');
        $.ajax({
            url: "api/me/device/" + uid,
            type: "patch",
            data: {"default": 1},
            dataType: "json"
        }).then(function(data) {
            if (!data.status) {
                document.location.reload();
            } else {
                console.error(data.message);
                alert(data.message);
            }
        }).fail(function (error) {
            console.error(error);
            alert('Connection lost');
        });
    },

    removeDevice: function (event) {
        event.preventDefault();
        var uid = $(event.target).data('id');
        if (confirm('Are you sure to remove this device?')) {
            $.ajax({
                url: "api/me/device/" + uid,
                type: "delete",
                dataType: "json"
            }).then(function(data) {
                if (!data.status) {
                    $('#uid-' + uid).remove();
                } else {
                    console.error(data.message);
                    alert(data.message);
                }
            }).fail(function (error) {
                console.error(error);
                alert('Connection lost');
            });
        }
    },

    init: function () {
        $('#sign-in-form').on('submit', this.loginFormSubmit.bind(this));
        $('#sign-in').on('click', this.loginFormSubmit.bind(this));

        $(document).on('click', '.disconnect-device', this.disconnectDevice.bind(this));
        $(document).on('click', '.connect-device', this.connectDevice.bind(this));
        $(document).on('click', '.make-main-device', this.makeMainDevice.bind(this));
        $(document).on('click', '.remove-device', this.removeDevice.bind(this));
    }
};

$(function() {
    app.init();
});