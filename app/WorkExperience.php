<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $table = 'work_experience';

    protected $fillable = [
        'position',
        'employer',
        'startSalary',
        'otherBenefits',
        'tasks',
        'beginDate',
        'endDate',
        'country',
        'reasonOfResignation',
        'applies_id'
    ];

    public function apply()
    {
        return $this->belongsTo('App\Apply','applies_id');
    }
}
