<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['brand', 'slug', 'name', 'licence', 'turnover', 'taxes', 'fax', 'speaker', 'address', 'build', 'floor', 'apt_nbr', 'zip', 'city_id', 'premium_id'];
}
