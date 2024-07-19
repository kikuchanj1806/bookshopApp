<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'typeId',
        'code',
        'price',
        'oldPrice',
        'quantity',
        'status',
        'categoryId',
        'brand',
        'weight',
        'width',
        'length',
        'height',
        'thumbnail',
        'image',
        'unit',
        'description',
        'content',
        'video',
        'showNew',
        'showHot',
        'showHome',
        'promotionContent',
        'promotionValue'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'categoryId');
    }
}
