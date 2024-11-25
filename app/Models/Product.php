<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["name_en","name_ar","quantity","image","price"];

    public function getNameAttribute () {

        return $this->attributes['name_' . app()->getLocale()];
    }

    public function purchaseCount(){
       return  DB::table('order_details')
        ->where('product_id', $this->id)
        ->count();
    }
}
