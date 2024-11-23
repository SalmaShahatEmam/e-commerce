<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        if (array_key_exists('HTTP_AUTHORIZATION', $_SERVER)) {

            $this->middleware('auth:sanctum');
        }
    }
    public function index()
    {
        $products = Product::all();
        return $this->response(ProductResource::collection($products), "", 200);
    }

    public function show(Product $product)
    {
        return $this->response(new ProductResource($product), "", 200);
    }
}
