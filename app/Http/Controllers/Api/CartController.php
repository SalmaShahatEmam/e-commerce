<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class CartController extends Controller
{
    use ApiResponse;

    public function myCart(){

        $user = auth()->user();
        $products = $user->cart;
        return $this->response(ProductResource::collection($products), "", 200);

    }
    public function addToCart(Request $request)
    {
        $user = auth()->user();

        if($user->cart->contains($request->product_id)){

            return $this->response(null , __("this product already in cart") , 404);
        }
        $user->cart()->attach($request->product_id ,["quantity" => $request->quantity]);

        return $this->response(null ,__("product added to cart successfully") , 200);
    }
    public function deletefromCart(Product $product)
    {
        $user = auth()->user();

        if(!$user->cart->contains($product->id)){

            return $this->response(null , __("this product not found in cart"),404);
        }

        $user->cart()->detach($product->id);

        return $this->response(null , __("product deleted from cart successfully"),200);
    }
   
    public function quantityUpdate(Request $request , Product $product)
    {
        $user = auth()->user();
        
        if(!$user->cart->contains($product->id)){

            return $this->response(null , __("this product not found in cart"),404);
        }
        $user->cart()->updateExistingPivot($product->id, [
            'quantity' => $request->quantity,
        ]);

        return $this->response(null , __("product quantity updated successfully"),200);
    }


}
