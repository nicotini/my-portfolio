<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'skills';
    protected $fillable = [
        'title',
        'proficiency',
        'service_id'
    ];

    public function service() 
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
