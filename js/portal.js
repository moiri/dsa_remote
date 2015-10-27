$(document).ready(function() {
    var socket, username, chat;

    // $.getJSON('php/get_hero.php', username, function(json) { });

    $('[id|="held-login"]').click(function () {
        socket = io.connect('http://localhost:3000');
        username = $(this).text();
        // If the username is valid
        if (username) {
            $('.loginPage').hide();
            $('.chatPage').show();

            chat = new Chat(socket, username);

            // Tell the server your username
            socket.emit('add user', username);
        }
    });
    $('[id|="link"]').click(function () {
        var id = $(this).attr('id').split('-');
        $('[id|="link"]').removeClass('active');
        $('#link-' + id[1] + '-nav').addClass('active');
    });
});
