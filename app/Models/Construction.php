<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    use HasFactory;
    protected $table = 'constructions';

    protected $fillable = [
        'cat_id',
        'admin_id',
        'title',
        'content',
        'status',
        'image'
    ];

    public function construction_cat()
    {
        return $this->belongsTo(ConstructionCat::class,'cat_id');
    }
}
