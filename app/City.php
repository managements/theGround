<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['city'];

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function position()
    {
        return $this->hasOne(Position::class);
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }
}
