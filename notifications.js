const { createServer } = require('http');
const { Server } = require('socket.io');

// إنشاء خادم HTTP
const server = createServer();
const io = new Server(server, {
    cors: {
        origin: '*', // السماح لجميع المصادر
    },
});

// عند الاتصال
io.on('connection', (socket) => {
    console.log(`Client connected: ${socket.id}`);
});

// استقبال البيانات من Laravel
const express = require('express');
const app = express();
app.use(express.json());

app.post('/broadcast', (req, res) => {
    const data = req.body;
    io.emit('orderCreated', data); // إرسال البيانات إلى المتصفحات
    res.send('Broadcasted!');
});

app.listen(3001, () => console.log('Listening for Laravel on http://localhost:3001'));

// تشغيل Socket.IO على منفذ 3000
server.listen(3000, () => {
    console.log('Socket.IO server running on http://localhost:3000');
});
