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
                loadDevices(token);
            }

        }).fail(function (error) {
            console.error(error);
            alert('Connection lost');
        });
    }

    function loadDevices(token) {
        $.ajax({
            url: "api/index.php?action=me/devices&token=" + token,
            type: "get",
            dataType: "json"
        }).then(function(data) {
            if (data.status) {
                console.error(data.message);
                alert(data.message);
            } else {
                fillDevices(data.devices);
            }

        }).fail(function (error) {
            console.error(error);
            alert('Connection lost');
        });
    }

    function fillDevices(devices) {
        $('.devices-contant').html('');
        for (var i = 0; i < devices.length; ++i) {
            var deviceHtml =
            '<li class="device online-device">' +
                '<div class="device_image hidden-xs text-right col-md-1 col-sm-1">' +
                    '<img src="assets/img/devices/iphone.svg" alt="' + devices[i].name + '">' +
                '</div>' +
                '<a class="device_info online-device collapse-btn col-md-4 col-sm-4">' +
                    '<b>' + devices[i].model + '</b>' +
                    '<span>ID: ' + devices[i].uid + '</span>' +
                '</a>' +
                '<div class="device_btn-group collapse col-md-7 col-sm-7" id="device2">' +
                    '<ul>' +
                        //'<li><a href="#" class="btn">Disconnect</a></li>' +
                        //'<li><a href="#" class="btn">Make Main</a></li>' +
                        '<li><a href="#" class="btn btn-clear">Remove</a></li>' +
                    '</ul>' +
                '</div>' +
            '</li>';
            $('.devices-contant').append(deviceHtml);
        }
    }
});