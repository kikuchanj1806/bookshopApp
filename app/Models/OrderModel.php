<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'phone',
        'address',
        'note',
        'cityId',
        'districtId',
        'wardId',
        'products',
        'is_locked',
        'created_by',
    ];

    protected $casts = [
        'products' => 'array',
        'is_locked' => 'boolean',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
