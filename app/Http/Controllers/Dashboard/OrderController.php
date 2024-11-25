<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{
    public function __construct(protected OrderRepositoryInterface $orderRepo){

    }
    
    public function index()
    {
        $orders = $this->orderRepo->getOrders();

        return view('dashboard.orders.index' , compact('orders'));
    }

    
    public function show($id)
    {
        $order = $this->orderRepo->getOrder($id);

        return view('dashboard.orders.show' ,compact('order'));
    }


}
