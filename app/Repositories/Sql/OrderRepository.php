<?php
namespace App\Repositories\Sql;

use App\Models\Order;
use App\Events\OrderCreated;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface {

    public function __construct(protected Order $model)
    {
        
    }

    public function createOrder(){
        $user = auth()->user();
        $products = $user->cart;
        $total_price = $this->getTotalPrice($products);
        $order = null;

        DB::transaction(function () use ($total_price , $user , $products ,$order){

            $order = $user->order()->create([
                'total_price' => $total_price
            ]);

            foreach($products as $product){
                $product->decrement('quantity', $user->ProductQuantityInCart($product->id));
                $order->products()->attach($product->id ,[
                    'quantity' => $user->ProductQuantityInCart($product->id),
                    'product_price' => $product->price
                ]);
                $products = $user->cart()->detach($product->id);

                
            }
            event(new OrderCreated($order));

        });
      
        return true;

    }

    public function getTotalPrice($products){

        $total_price = 0;

        $user = auth()->user();

        foreach($products as $product){
            $total_price = $product->price * $user->ProductQuantityInCart($product->id) + $total_price;
        }

        return $total_price;
    }

}