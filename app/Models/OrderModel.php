<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    protected $table = 'order_models';

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
        'billOfLading',
        'gift_code'
    ];

    protected $casts = [
        'products' => 'array',
        'is_locked' => 'boolean',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function products()
    {
        return $this->hasMany(ProductModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
