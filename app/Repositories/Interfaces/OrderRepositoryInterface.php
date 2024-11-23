<?php

namespace App\Repositories\Interfaces;

Interface OrderRepositoryInterface
{
   public function getTotalPrice($products);
   public function createOrder();

}