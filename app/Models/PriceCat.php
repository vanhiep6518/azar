<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceCat extends Model
{
    use HasFactory;
    protected $table = 'price_cats';

    protected $fillable = [
        'admin_id',
        'name',
        'slug',
        'parent_id',
        'level',
    ];

    public function prices()
    {
        return $this->hasMany(Price::class,'cat_id');
    }
}
