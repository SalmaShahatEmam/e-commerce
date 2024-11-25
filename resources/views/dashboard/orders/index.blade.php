@extends('dashboard.layouts.app')

@section('title', "all orders")

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="">{{"all orders" }}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
            <div class="content-body">
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>client name </th>
                                            <th>Date</th>
                                            <th>product number</th>
                                            <th>total price</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->created_at->format('d M Y, h:i A'); }}</td>
                                                <td>{{ $order->products->count() }}</td>

                                                <td>{{ $order->total_price }}</td>
                                                

                                         

                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
    @push('js')
        <script src="{{ asset('dashboard/app-assets/js/custom/custom-delete.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="{{ asset('dashboard/app-assets/js/custom/active-users.js') }}"></script>
        
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
            const notificationBell = document.getElementById('notifications');
    const notificationSound = document.getElementById('notification-sound');

    const notificationItem = `
            <a class="d-flex" href="javascript:void(0)">
                <div class="media d-flex align-items-start">
                    <div class="media-left">
                        <div class="avatar bg-light-primary">
                            <div class="avatar-content">${event.order_id}</div>
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="media-heading">
                            <span class="font-weight-bolder">New Order by ${event.user_name}</span>
                        </p>
                        <small class="notification-text">Total: $${event.total_price}</small>
                    </div>
                </div>
            </a>
        `;

        const notificationsList = document.querySelector('.media-list');
        notificationsList.insertAdjacentHTML('afterbegin', notificationItem);


    function triggerNotification() {
        let badge = notificationBell.querySelector('.badge');
        if (!badge) {
            badge = document.createElement('span');
            badge.classList.add('badge', 'badge-pill', 'badge-danger', 'badge-up');
            badge.textContent = '1'; 
            
            notificationBell.appendChild(badge);
        } else {
            badge.textContent = parseInt(badge.textContent) + 1;
        }

        notificationSound.play();
    }

    setTimeout(triggerNotification, 1000); 
        });
</script>

    @endpush
@endsection
