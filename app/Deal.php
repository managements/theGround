<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = ['name', 'slug', 'speaker','address','build','floor','apt_nbr','city_id','description','vote','provider','client','company_id'];

    public function tel()
    {
        return $this->hasOne(Tel::class);
    }

    public function email()
    {
        return $this->hasOne(Email::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
