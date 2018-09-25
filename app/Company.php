<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['brand', 'slug', 'name', 'licence', 'turnover', 'taxes', 'fax', 'speaker', 'address', 'build', 'floor', 'apt_nbr', 'zip', 'city_id', 'premium_id'];

    public function getRouteKey()
    {
        return 'slug';
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function premium()
    {
        return $this->belongsTo(Premium::class);
    }

    public function email()
    {
        return $this->hasOne(Email::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function tel()
    {
        return $this->hasOne(Tel::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }
}
