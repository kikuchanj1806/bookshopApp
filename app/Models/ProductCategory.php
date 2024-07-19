<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'description'
    ];

//    public function product()
//    {
//        return $this->hasMany(ProductCategory::class);
//    }
//
//    public function parent()
//    {
//        return $this->belongsTo(ProductCategory::class, 'parent_id');
//    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }
}
