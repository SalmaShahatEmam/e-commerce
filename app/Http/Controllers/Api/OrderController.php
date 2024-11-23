<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Traits\ApiResponse;
use App\Events\OrderCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{
    use ApiResponse;

    public function __construct(protected OrderRepositoryInterface $orderRepo){

    }
   
    public function createOrder()
    {
        $this->orderRepo->createOrder(); 
        
        return $this->response(null , __('Order Created successfully') , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


}
