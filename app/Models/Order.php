<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'table_number',
        'status',
        'total',
        'created_at',
        'updated_at'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
