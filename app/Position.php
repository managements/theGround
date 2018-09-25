<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['position', 'first_name', 'last_name', 'comment'];
}
