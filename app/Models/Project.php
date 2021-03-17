<?php

namespace App\Models;

use App\Helpers\StringHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $table = 'projects';

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

    protected $appends = ['slug'];

    public function project_cat()
    {
        return $this->belongsTo(ProjectCat::class,'cat_id');
    }

    public function getSlugAttribute()
    {
        return StringHelpers::slugify($this->attributes['title']);
    }
}
