<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Traits\ApiResponse;
use App\Events\OrderCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{
    use ApiResponse;

    public function __construct(protected OrderRepositoryInterface $orderRepo){

    }

    public function index()
    {
        $orders = $this->orderRepo->getAllOrders();

        return $this->response(OrderResource::collection($orders) , __('Order Created successfully') , 200);


    }

    public function store()
    {
        $user = auth()->user();

        if($user->hasEmptyCart()){

            return $this->response(null , __('your cart is empty') , 422);

        }

        $this->orderRepo->createOrder();

        return $this->response(null , __('Order Created successfully') , 200);
    }


    public function show($id)
    {
        $order = $this->orderRepo->getOrder($id);

        if(!$order){
            return $this->response(null , __('Order not found') , 404);

        }

        return $this->response( [ "order_basic_info" => new OrderResource($order) , "order_products" => ProductResource::collection($order->products) ], __('Order Created successfully') , 200);

    }


}
