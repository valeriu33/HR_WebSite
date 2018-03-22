<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $table = 'studies';

    protected $fillable = [
        'institution',
        'country',
        'degree',
        'beginDate',
        'endDate',
        'certificate',
        'applies_id',
    ];

    public function apply()
    {
        return $this->belongsTo('App\Apply','applies_id');
    }
}