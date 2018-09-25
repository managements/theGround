<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['token', 'range', 'category_id', 'company_id'];
}
