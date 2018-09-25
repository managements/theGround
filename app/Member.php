<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['face', 'name', 'first_name', 'last_name', 'birth', 'address', 'city_id', 'premium_id', 'category_id', 'user_id', 'company_id'];
}
