'use strict';

var app = {

    disconnectDevice: function (event) {
        event.preventDefault();
    },

    connectDevice: function (event) {
        event.preventDefault();
    },

    makeMainDevice: function (event) {
        event.preventDefault();
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
        $(document).on('click', '.disconnect-device', this.disconnectDevice.bind(this));
        $(document).on('click', '.connect-device', this.connectDevice.bind(this));
        $(document).on('click', '.make-main-device', this.makeMainDevice.bind(this));
        $(document).on('click', '.remove-device', this.removeDevice.bind(this));
    }
};

$(function() {
    app.init();
});