<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstructionProgress extends Model
{
    use HasFactory;
    protected $table = 'construction_progress';

    protected $fillable = [
        'admin_id',
        'customer_name',
        'code',
        'content',
        'status',
    ];
}
