<?php

namespace App\Models;

use App\Helpers\StringHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    use HasFactory;
    public $table = 'furnitures';

    protected $fillable = [
        'cat_id',
        'admin_id',
        'title',
        'content',
        'status',
        'image'
    ];
    protected $appends = ['slug'];


    public function furniture_cat()
    {
        return $this->belongsTo(FurnitureCat::class,'cat_id');
    }

//    protected $appends = [''];

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = json_encode($value);
    }

    public function getImageAttribute()
    {
        return json_decode($this->attributes['image']);
    }

    public function getSlugAttribute()
    {
        return StringHelpers::slugify($this->attributes['title']);
    }
}
