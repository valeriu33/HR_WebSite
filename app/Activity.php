<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = [
        'nameOfOrganizer',
        'location',
        'trainingSubjects',
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
