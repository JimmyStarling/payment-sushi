<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;
    
    public function definition(): array
    {
        return [
            'items' => Arr::random([
                ['temaki', 'sushi roll'],
                ['alga frita', 'bolinho de arroz'],
                []
            ]),
            'tags' => Arr::random([
                ['urgente', 'pagamento pendente'],
                ['novo', 'entrega expressa'],
                ['revisar', 'atrasado'],
                ['finalizado'],
                []
            ]),
            'total' => $this->faker->randomFloat(2, 10, 200),
            'status' => $this->faker->randomElement(['pending', 'paid', 'cancelled']),
            'user_id' => \App\Models\User::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
