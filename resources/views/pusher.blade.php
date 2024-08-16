<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>
</head>

<body>
    <h1>form</h1>
    <form action="{{ route('user_add') }}" method="post">
        @csrf
        <label>Name</label>
        <input type="text" name="username" /><br><br>
        <label>email</label>
        <input type="email" name="useremail" /><br><br>
        <label>password</label>
        <input type="text" name="userpassword"><br><br>
        <button type="submit">Submit</button>
    </form><br>

    <input type="text" id="enterMessage" required>
    <input type="submit" id="sendMessage">
    <ul id="response"></ul>
    {{-- <h4 id="response"></h4> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            let socket = io('http://localhost:3000');
            const messageInput = document.getElementById('enterMessage');

            document.getElementById('sendMessage').addEventListener('click', () => {
                // socket.emit('message', 'Hello Server!');
                const message = messageInput.value;
                if (message) {
                    socket.emit('message', message);
                    messageInput.value = '';
                }
            });

            const messagesList = document.getElementById('response');
            socket.on('abc', (response) => {
                // $('#response').html(message);
                const listItem = document.createElement('li');
                listItem.textContent = response;
                messagesList.appendChild(listItem);
            });
        });
    </script>
</body>

</html>
