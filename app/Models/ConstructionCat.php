<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstructionCat extends Model
{
    use HasFactory;
    protected $table = 'construction_cats';

    protected $fillable = [
        'admin_id',
        'name',
        'slug',
        'parent_id',
        'level',
    ];
}
