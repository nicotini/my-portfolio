<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'services';
    protected $with = ['skills'];
    protected $fillable = [
        'title',
        'icon',
        'desc'
    ];
    

    public function skills()
    {
        return $this->hasMany(Skill::class, 'service_id',' id');
    }
}
