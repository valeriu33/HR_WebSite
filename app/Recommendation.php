<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $table = 'recommendations';

    protected $fillable = [
        'name',
        'address',
        'position',
        'contact',
        'applies_id',
    ];

    public function apply()
    {
        return $this->belongsTo('App\Apply','applies_id');
    }
}
