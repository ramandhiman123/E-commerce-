
import { createServer } from "http";
import { Server } from "socket.io";

const httpServer = createServer();

const io = new Server(httpServer, {
    cors: { origin: "*" }
})

io.on("connection", (socket) => {
    console.log('connected');
    socket.on('message', (data) => {
        io.emit('abc', data);
        // socket.broadcast.emit('abc', 'Message received loud and clear!');
        // console.log('Message received:', data);
    });

    socket.on('Receivermessage', (data) => {
        io.emit('abc', data);
    });
    socket.on('disconnect', () => {
        console.log('Disconnect');
    });
});

httpServer.listen(3000, () => {
    console.log('Server is running');
});
