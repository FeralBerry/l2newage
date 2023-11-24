<?PHP
header('Access-Control-Allow-Origin: *');
?>
<html>
<head>
    <script src="{{ asset('jquery-3.6.1.js') }}"></script>
    <script src="https://cdn.socket.io/4.5.3/socket.io.js"></script>
</head>
<body>
<script>
    $(function () {
        var socket = io('http://locahost:4710/');
        socket.on('update', data => console.log(data))

        socket.on('connect_error', err => handleErrors(err))
        socket.on('connect_failed', err => handleErrors(err))
        socket.on('disconnect', err => handleErrors(err))
    });
</script>
</body>
</html>
