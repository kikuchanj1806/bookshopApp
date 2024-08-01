<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\AppFormat;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name', 'code', 'price', 'oldPrice', 'quantity', 'status', 'categoryId', 'brand',
        'weight', 'width', 'length', 'height', 'thumbnails', 'image', 'unit', 'description',
        'content', 'video', 'showNew', 'showHot', 'showHome', 'promotionContent',
        'promotionValue', 'slug'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'categoryId');
    }

    public function relatedProducts()
    {
        return $this->hasMany(self::class, 'categoryId', 'categoryId')->where('id', '!=', $this->id);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = AppFormat::slugify($product);
        });

        static::updating(function ($product) {
            $product->slug = AppFormat::slugify($product);
        });
    }
}
