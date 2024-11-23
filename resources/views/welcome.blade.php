// Include Pusher and Laravel Echo scripts
<script src="https://cdn.jsdelivr.net/npm/pusher-js@7.0.3/dist/web/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.10.0/dist/echo.iife.js"></script>

<script>
    // Initialize Echo with Pusher
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: 'c78942dc79865b01eae1',
        cluster: 'ap2',
        forceTLS: true,
    });



    // Listen for events on the 'orders' channel
    window.Echo.channel('orders')
        .listen('OrderCreated', (event) => {
            console.log('New Order Created:', event);
            alert('New Order Created: Order ID ' + event.order_id);
        });
</script>
