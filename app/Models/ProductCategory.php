<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\AppFormat;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'status',
        'parent_id',
        'image',
        'icon',
        'order',
        'description',
        'slug'
    ];

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = AppFormat::slugify($category);
        });

        static::updating(function ($category) {
            $category->slug = AppFormat::slugify($category);
        });
    }

}
