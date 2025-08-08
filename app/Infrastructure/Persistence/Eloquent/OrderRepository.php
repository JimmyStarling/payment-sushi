<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Models\Order as EloquentOrder;
use App\Domain\Order\Repositories\OrderRepositoryInterface;
use App\Domain\Order\Entities\Order;

use Illuminate\Support\Str;

class OrderRepository implements OrderRepositoryInterface
{
    public function all(): array
    {
        // Aqui é usado um operador ternário
        // Pois o PHP8+ tem dificuldade em conversão de tipagens do tipo items e tags
        // Mesmo com o cast; TODO: verificar nas próximas breaking changes se persiste falha.
        return EloquentOrder::all()->map(fn($eloquentOrder) => new Order(
            id: $eloquentOrder->id,
            userId: $eloquentOrder->user_id,
            items: is_array($eloquentOrder->items) ? $eloquentOrder->items : json_decode($eloquentOrder->items, true),
            tags: is_array($eloquentOrder->tags) ? $eloquentOrder->tags : json_decode($eloquentOrder->tags, true),
            status: $eloquentOrder->status,
            total: $eloquentOrder->total
        ))->toArray();
    }
    
    public function save(Order $order): void
    {
        // Certifique que o ID exista antes
        if (empty($order->id)) {
            $order->id = (string) Str::uuid();
        }

        EloquentOrder::updateOrCreate(
            ['id' => $order->id],
            [
                'user_id' => $order->userId,
                'items'   => json_encode($order->items ?? []),
                'tags'    => json_encode($order->tags ?? []),
                'status'  => $order->status,
                'total'   => $order->total,
            ]
        );
    }

    public function findById(string $id): ?Order
    {
        $eloquentOrder = EloquentOrder::find($id);
        if (!$eloquentOrder) return null;

        return new Order(
            id: $eloquentOrder->id,
            userId: $eloquentOrder->user_id,
            items: $eloquentOrder->items,
            tags: $eloquentOrder->tags,
            status: $eloquentOrder->status,
            total: $eloquentOrder->total
        );
    }
}