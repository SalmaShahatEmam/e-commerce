<?php

namespace App\Services;

use Illuminate\Validation\ValidationException;

class cartService
{
    public function getNewQauntity($action , $old_quantity , $quantity){

        return $action == "dec" ? $old_quantity - $quantity : $quantity + $old_quantity ;
    }

    public function validateNewQuantity($product_quantity , $new_quanity){

        if($product_quantity < $new_quanity){

            throw ValidationException::withMessages([
                'quantity' => [__('The provided quantity are unavailable.')],
            ]);
        }

        return true;
    }
}
