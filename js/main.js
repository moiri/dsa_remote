$(document).ready(function() {
    var socket, username, chat;
    socket = io.connect('http://localhost:3000');

    // $.getJSON('php/get_hero.php', username, function(json) { });

    $('.heroInput').click(function () {
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
});
