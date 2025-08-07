<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $id
 * @property string $user_id
 * @property string $status
 * @property float $total
 * @property array $items
 * @property array $tags
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read User $user
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'total',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
        'tags' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
