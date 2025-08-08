<?php

namespace App\Domain\Order\Repositories;

use App\Domain\Order\Entities\Order;

interface OrderRepositoryInterface
{
    public function all(): array;
    public function save(Order $order): void;
    public function findById(string $id): ?Order;
}