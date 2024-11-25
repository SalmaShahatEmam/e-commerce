<?php

namespace App\Services;

use App\Models\User;
use App\Events\OrderCreated;
use App\Notifications\OrderNotification;
use Illuminate\Validation\ValidationException;

class notificationService
{

    public function sendOrderNotificationsToAdmin($order)
    {
        event(new OrderCreated($order));

        $admin = User::role('admin')->first(); 
        if ($admin) {
            $admin->notify(new OrderNotification($order));
        }

        return true;
    }
}
