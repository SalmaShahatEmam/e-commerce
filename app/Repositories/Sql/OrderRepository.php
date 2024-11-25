<?php
namespace App\Repositories\Sql;

use App\Models\User;
use App\Models\Order;
use App\Events\OrderCreated;
use Illuminate\Support\Facades\DB;
use App\Services\notificationService;
use App\Notifications\OrderNotification;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface {

    public function __construct(protected Order $model , protected notificationService $notificationService)
    {

    }

    public function getOrders(){

        return $this->model->with(['user','products'])->get();
    }

    public function getOrder($id)
    {
        $order =  $this->model->with(['user','products'])->where('id',$id)->first();

        return $order ?? null;

    }

    /* public function createOrder(){

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

            $admin = User::admin()->first();

            $admin->notify(new OrderNotification($order));


        });

        return true;

    } */

    public function createOrder()
{
    $user = auth()->user();
    $products = $user->cart;
    $totalPrice = $this->getTotalPrice($products);

    try {
        $order = DB::transaction(function () use ($user, $products, $totalPrice) {
            $order = $user->order()->create([
                'total_price' => $totalPrice,
            ]);

            foreach ($products as $product) {
                $quantity = $user->ProductQuantityInCart($product->id);

                $product->decrement('quantity', $quantity);

                $order->products()->attach($product->id, [
                    'quantity' => $quantity,
                    'product_price' => $product->price,
                ]);

                $user->cart()->detach($product->id);
            }

            return $order;
        });

        $this->notificationService->sendOrderNotificationsToAdmin($order);

        return $order;
        
    } catch (Exception $e) {
        return false;
    }
}


    public function getTotalPrice($products){

        $total_price = 0;

        $user = auth()->user();

        foreach($products as $product){
            $total_price = $product->price * $user->ProductQuantityInCart($product->id) + $total_price;
        }

        return $total_price;
    }

    public function getAllOrders(){

        $user = auth()->user();

        $orders = $user->order;

        return $orders->isEmpty() ? null : $orders;
    }

    public function orderDetails($order)
    {
        $products =  $order->products;

        return $products->isEmpty() ? null : $products;

    }

}
