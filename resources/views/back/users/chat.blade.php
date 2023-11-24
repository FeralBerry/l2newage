<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>videoChatApp</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
    <script src="https://kit.fontawesome.com/c939d0e917.js"></script>
    <script src="https://unpkg.com/peerjs@1.3.1/dist/peerjs.min.js"></script>
    <script>
        const ROOM_ID = "<%= roomId %>";
    </script>
</head>
<body>
<div class="header">
    <div class="logo">
        <div class="header__back">
            <i class="fas fa-angle-left"></i>
        </div>
        <h3>Video Chat</h2>
    </div>
</div>
<div class="main">
    <div class="main__left">
        <div class="videos__group">
            <div id="video-grid">

            </div>
        </div>
        <div class="options">
            <div class="options__left">
                <div id="stopVideo" class="options__button">
                    <i class="fa fa-video-camera"></i>
                </div>
                <div id="muteButton" class="options__button">
                    <i class="fa fa-microphone"></i>
                </div>
                <div id="showChat" class="options__button">
                    <i class="fa fa-comment"></i>
                </div>
            </div>
            <div class="options__right">
                <div id="inviteButton" class="options__button">
                    <i class="fas fa-user-plus"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="main__right">
        <div class="main__chat_window">
            <div class="messages">

            </div>
        </div>
        <div class="main__message_container">
            <input id="chat_message" type="text" autocomplete="off" placeholder="Type message here...">
            <div id="send" class="options__button">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    var socket = io();
</script>
</html>
{{--
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
<script src="https://cdn.socket.io/4.5.3/socket.io.js"></script>
<script>
    var socket = io(':4710');
    socket.on('message',function (data) {
        console.log('From server:',data);
    });
</script>
</body>
</html>--}}
