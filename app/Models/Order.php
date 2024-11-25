<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['total_price' ,'status','user_id' ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'order_details')->withPivot(['quantity','product_price']);
    }
}
