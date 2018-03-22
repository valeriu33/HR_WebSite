<?php

namespace App;

use Faker\Provider\PhoneNumber;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    protected $table = 'personal_info';

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'filename',
        'cellPhoneNumber',
        'phoneNumber',
        'address',
        'nationality',
        'countryOfBirth',
        'applies_id',
    ];

    public function apply()
    {
        return $this->belongsTo('App\Apply','applies_id');
    }
}
