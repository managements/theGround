<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tel extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['tel', 'member_id', 'company_id'];
}
