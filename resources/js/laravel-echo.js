import Echo from 'laravel-echo';
// import io from 'socket.io-client';

// Initialize Echo with Socket.IO
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001',
    // client: io,
});