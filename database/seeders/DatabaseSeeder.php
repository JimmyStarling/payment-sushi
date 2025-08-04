<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            OrderSeeder::class,
        ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Order::create([
        //     'user_id' => 1,
        //     'status' => 'processing',
        //     'total' => 49.90,
        //     'items' => ['Item A', 'Item B', 'Item C'],
        // ]);

    }
}
