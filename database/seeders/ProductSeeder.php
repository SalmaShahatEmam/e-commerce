<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

   
    public function run()
    {
        $products = [

            [
                "name_en" => "product 1",
                "name_ar" => "منتج 1",
                "quantity"=> "3",
                "price"   => "11.5", 
            ],
            [
                "name_en" => "product 2",
                "name_ar" => "منتج 2",
                "quantity"=> "0",
                "price"   => "111.5", 
            ]
        ];

        Product::insert($products);
    }
}
