<?php

namespace App\Application\UseCases\Order;

use App\Domain\Order\Entities\Order;
use App\Domain\Order\Repositories\OrderRepositoryInterface;
use Illuminate\Support\Str;

class CreateOrderUseCase
{
    public function __construct(
        private OrderRepositoryInterface $orderRepository
    ) {}

    public function execute(array $data): void
    {
        $order = new Order(
            id: Str::uuid(),
            userId: $data['user_id'],
            items: $data['items'] ?? [],
            tags: $data['tags'] ?? [],
            status: $data['status'],
            total: $data['total']
        );

        $this->orderRepository->save($order);
    }
}