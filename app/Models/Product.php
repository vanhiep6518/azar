<?php

namespace App\Models;

use App\Helpers\StringHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = 'products';

    protected $fillable = [
        'cat_id',
        'admin_id',
        'name',
        'code',
        'price',
        'short_desc',
        'detail',
        'image',
        'status',
        'popular',
        'best_selling'
    ];

    protected $appends = ['slug','cat_slug'];



    public function product_cat()
    {
        return $this->belongsTo(ProductCat::class,'cat_id');
    }

    public function getCatSlugAttribute()
    {
        return ProductCat::where('id',$this->attributes['cat_id'])->first()->slug ?? '';
    }

    public function getSlugAttribute()
    {
        return StringHelpers::slugify($this->attributes['name']);
    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = json_encode($value);
    }

    public function getImageAttribute()
    {
        return json_decode($this->attributes['image']);
    }


}
