<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class InStock
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $product = Product::findOrFail($request->product_id);
        
        if($product->quantity = 0  || $request->quantity > $product->quantity ){

            throw ValidationException::withMessages([
                'quantity' => [__('The provided quantity are unavailable.')],
            ]);
        }

        return $next($request);

    }
}
