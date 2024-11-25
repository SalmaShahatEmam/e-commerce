<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Services\cartService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CartRequest;
use App\Http\Resources\ProductResource;

class CartController extends Controller
{
    use ApiResponse;

    public function __construct(protected cartService $cartService){}


    public function myCart(){

        $user = auth()->user();
        $products = $user->cart;
        return $this->response(ProductResource::collection($products), __("happy cart"), 200);

    }

    public function addToCart(CartRequest $request)
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

   /*  public function quantityUpdate(Request $request)
    {
        $user = auth()->user();

        if(!$user->cart->contains($request->product_id)){

            return $this->response(null , __("this product not found in cart"),404);
        }
        $user->cart()->updateExistingPivot($request->product_id, [
            'quantity' => $request->quantity,
        ]);

        return $this->response(null , __("product quantity updated successfully"),200);
    } */

    public function quantityUpdate(CartRequest $request)
    {
        $user = auth()->user();

        $products = $user->cart;


        if(!$user->cart->contains($request->product)){

            return $this->response(null , __("this product not found in cart"), 404 );
        }

        $new_quantity = $this->cartService->getNewQauntity($request->action , $user->productQuantityInCart($request->product)  , $request->quantity);

        if($this->cartService->validateNewQuantity($products->find($request->product)->quantity , $new_quantity))
        {
            $user->cart()->updateExistingPivot($request->product, [
                'quantity' => $new_quantity,
            ]);

        }

        return $this->response(ProductResource::collection($products),__("product quantity updated successfully"),200);

    }



}
