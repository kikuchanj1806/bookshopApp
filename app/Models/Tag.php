<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    const TYPE_CLASS = 1;
    const TYPE_SUBJECT = 2;

    protected $fillable = [
        'name',
        'type',
    ];

    public function products()
    {
        return $this->belongsToMany(ProductModel::class, 'product_tag', 'tag_id', 'product_id');
    }
}
