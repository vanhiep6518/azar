<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnitureCat extends Model
{
    use HasFactory;
    protected $table = 'furniture_cats';

    protected $fillable = [
        'admin_id',
        'name',
        'slug',
        'parent_id',
        'level',
    ];
}
