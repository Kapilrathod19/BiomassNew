<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'designation',
        'description',
        'created_by',
        'image',
    ];
}
