<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Twilio\Rest\Client;

use App\Domain\Order\Repositories\OrderRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\OrderRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Client::class, function ($app) {
            return new Client(
                config('services.twilio.sid'),
                config('services.twilio.token')
            );
        });
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
