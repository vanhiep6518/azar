<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $table = 'prices';

    protected $fillable = [
        'cat_id',
        'admin_id',
        'title',
        'content',
        'status',
    ];

    public function price_cat()
    {
        return $this->belongsTo(PriceCat::class,'cat_id');
    }
}
