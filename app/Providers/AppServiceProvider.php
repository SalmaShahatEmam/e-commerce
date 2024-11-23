<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Sql\UserRepository;
use App\Repositories\Sql\OrderRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
