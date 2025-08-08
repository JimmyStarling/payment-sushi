<?php

namespace App\Domain\Order\Entities;

class Order
{
    public function __construct(
        public readonly string $id,
        public int $userId,
        public array $items,
        public array $tags,
        public string $status,
        public float $total,
    ) {}
}