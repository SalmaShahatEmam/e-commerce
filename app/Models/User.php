<?php

namespace App\Models;

use App\Models\Product;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        "phone",
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function generateToken($device_id)
    {
        return  $this->createToken($device_id)->plainTextToken;
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function cart()
    {
        return $this->belongsToMany(Product::class,'carts')->withPivot('quantity');
    }

    public function ProductQuantityInCart($product_id)
    {
        $product = $this->cart()->where('product_id', $product_id)->first();
        
        return $product ? $product->pivot->quantity : null; 
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

}