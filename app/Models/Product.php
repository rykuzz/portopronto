<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'category_id',
        'name',
        'slogan',
        'slug',
        'detail',
        'price',
        'image',
        'qty',
        'status',
        'popular',
        'title',
        'keyword',
        'meta_desc',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}

