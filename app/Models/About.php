<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'abouts';
    protected $fillable = [
        'name',
        'desc',
        'email',
        'phone',
        'social_alias',
        'path_cv',
        'url_cv',
        'url_image',
        'path_image',
        'preview_url'
    ];
}
