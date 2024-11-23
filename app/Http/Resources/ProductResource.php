<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
   
    public function toArray($request)
    {
        $user = auth()->user();

        $data =[
            "id"=>     $this->id,
            "name"=>   $this->name,   
            "image" => $this->image ? asset("storage/".$this->image) : asset("failed.png"),
        ];

       if ($this->resource instanceof Product) {

            $data["out_of_stoke"] = !(bool)$this->quantity;
            $data["price"] = $this->price." ".__("currency");
            $data["product_in_cart"] = $user->cart->contains($this->id);
            $data["product_quantity_in_cart"] = $user->ProductInCart($this->id);
        } 

        return $data;
    }
}
