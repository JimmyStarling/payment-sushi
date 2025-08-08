<?php

namespace App\Infrastructure\Observers;

use App\Models\Order;
use App\Application\UseCases\Order\HandleOrderCreatedUseCase;

class OrderObserver
{
    public function __construct(private HandleOrderCreatedUseCase $handler) {}

    public function created(Order $order): void
    {
        $this->handler->execute($order);
    }
}