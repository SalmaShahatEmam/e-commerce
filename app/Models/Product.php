<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["name_en","name_ar","quantity","image","price"];

    public function getNameAttribute () {

        return $this->attributes['name_' . app()->getLocale()];
    }
}
