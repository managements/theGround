<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['email', 'member_id', 'company_id'];
}
