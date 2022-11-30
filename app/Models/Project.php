<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $guarded = false;
    protected $fillable = [
        'title',
        'desc',
        'link',
        'path_image',
        'url_image',
        'preview_url'
    ];
}
