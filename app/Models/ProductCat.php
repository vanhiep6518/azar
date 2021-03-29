<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCat extends Model
{
    use HasFactory;
    use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
    protected $table = 'product_cats';

    protected $fillable = [
        'admin_id',
        'name',
        'slug',
        'parent_id',
        'level',
    ];


    public function products()
    {
        return $this->hasMany(Product::class,'cat_id');
    }

    public function recursiveProducts()
    {
        return $this->hasManyOfDescendantsAndSelf(Product::class,'cat_id')->with('product_cat');
    }
}
