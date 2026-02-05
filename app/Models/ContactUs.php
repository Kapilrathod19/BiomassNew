<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'address',
        'map_link',
        'pinterest_link',
        'youtube_link',
        'instagram_link',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
    ];
}
