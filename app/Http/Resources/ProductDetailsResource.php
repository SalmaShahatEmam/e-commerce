<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailsResource extends JsonResource
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
            "price" => $this->price." ".__("currency"),
            "out_of_stoke" => !(bool)$this->quantity,
            "price"=> $this->price." ".__("currency"),
            "purchase_count" => $this->purchaseCount()
        ];

       if ($user) {
            
            $data["product_in_cart"] = $user->cart->contains($this->id);
            $data["product_quantity_in_cart"] = $user->productQuantityInCart($this->id);
        } 

        return $data;
    }
}
