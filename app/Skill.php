<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'skill',
        'level',
        'applies_id',
    ];

    public function apply()
    {
        return $this->belongsTo('App\Apply','applies_id');
    }
}
