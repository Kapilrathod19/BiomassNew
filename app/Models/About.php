<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'main_image',
        'title',
        'description',
        'our_vision',
        'our_mission',
        'projects',
        'experts',
        'clients',
        'experience',
    ];
}
