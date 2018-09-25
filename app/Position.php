<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['position', 'first_name', 'last_name', 'address', 'comment', 'city_id', 'company_id'];


    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tel()
    {
        return $this->hasOne(Tel::class);
    }

    public function email()
    {
        return $this->hasOne(Email::class);
    }
}
