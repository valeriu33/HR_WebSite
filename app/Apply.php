<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $table = 'applies';

    public function user() {
        return $this->belongsTo('App\User','users_id');
    }

    protected $fillable = [
        'vacancyName',
        'users_id',
    ];

    public function activities()
    {
        return $this->hasMany('App\Activity', 'applies_id');
    }

    public function languages()
    {
        return $this->hasMany('App\Language', 'applies_id');
    }

    public function personal_info()
    {
        return $this->hasOne('App\PersonalInfo', 'applies_id');
    }

    public function skills()
    {
        return $this->hasMany('App\Skill', 'applies_id');
    }

    public function studies()
    {
        return $this->hasMany('App\Study', 'applies_id');
    }

    public function  work_experience()
    {
        return $this->hasMany('App\WorkExperience', 'applies_id');
    }

    public function recommendations()
    {
        return $this->hasMany('App\Recommendation','applies_id');
    }
}
