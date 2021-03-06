<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    protected $fillable = [
        'admin_id',
        'title',
        'sub_title',
        'image',
        'detail_url',
        'image',
        'status'
    ];
}
