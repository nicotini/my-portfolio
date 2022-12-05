<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'messages';
    protected $fillable = [
        'name',
        'email',
        'subject',
        'desc',
        'status'
    ];

}
