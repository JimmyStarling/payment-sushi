<?php

namespace App\Application\UseCases\Order;

use App\Domain\Order\Repositories\OrderRepositoryInterface;

class GetOrdersUseCase
{
    public function __construct(private OrderRepositoryInterface $orderRepository) {}

    public function execute(): array
    {
        return $this->orderRepository->all(); // precisa criar esse método no repositório
    }
}