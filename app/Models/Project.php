<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';

    protected $fillable = [
        'cat_id',
        'admin_id',
        'title',
        'content',
        'price',
        'floors',
        'acreage',
        'status',
        'image'
    ];

    public function project_cat()
    {
        return $this->belongsTo(ProjectCat::class,'cat_id');
    }
}
