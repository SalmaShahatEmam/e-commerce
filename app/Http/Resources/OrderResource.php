<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */



    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'total_price' => $this->total_price.' '.__('currency') ,
            'date'        => $this->created_at->format('d M Y, h:i A'),
            'order_products_count' => $this->products->count(),
        ];
    }
}
