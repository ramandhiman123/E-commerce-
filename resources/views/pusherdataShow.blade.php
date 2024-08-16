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
    <table id="allusersdata">
        @foreach ($usersshow as $usershow)
            <tr>
                <td>{{ $usershow->name }}</td>
                <td>{{ $usershow->email }}</td>
                <td>{{ $usershow->password }}</td>
            <tr>
        @endforeach
    </table>
    <input type="text" id="enterReceiverMessage" required>
    <input type="submit" id="receiverMessage">
    <ul id="response1"></ul>
    {{-- <h2 id="response"></h2> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}} 

    <script>
        $(function() {
            let socket = io('http://localhost:3000');

            const messageInput1 = document.getElementById('enterReceiverMessage');

            document.getElementById('receiverMessage').addEventListener('click', () => {
                // socket.emit('message', 'Hello Server!');
                const message1 = messageInput1.value;
                if (message1) {
                    socket.emit('Receivermessage', message1);
                    messageInput1.value = '';
                }
            });
            const messagesList1 = document.getElementById('response1');
            socket.on('abc', (data) => {
                // document.getElementById('response').textContent = data;
                const listItems = document.createElement('li');
                listItems.textContent = data;
                messagesList1.appendChild(listItems);
            });
        });
    </script>
</body>

</html>
