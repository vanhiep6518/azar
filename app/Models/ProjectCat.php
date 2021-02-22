<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCat extends Model
{
    use HasFactory;
    protected $table = 'project_cats';

    protected $fillable = [
        'admin_id',
        'name',
        'slug',
        'parent_id',
        'level',
    ];
}
