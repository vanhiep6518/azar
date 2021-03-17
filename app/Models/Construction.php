<?php

namespace App\Models;

use App\Helpers\StringHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    use HasFactory;
    public $table = 'constructions';

    protected $fillable = [
        'cat_id',
        'admin_id',
        'title',
        'content',
        'status',
        'image'
    ];

    protected $appends = ['slug'];

    public function construction_cat()
    {
        return $this->belongsTo(ConstructionCat::class,'cat_id');
    }

    public function getSlugAttribute()
    {
        return StringHelpers::slugify($this->attributes['title']);
    }
}
