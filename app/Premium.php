<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['sold', 'range', 'limit', 'status_id'];

    /**
     * @var array
     */
    protected $table = ['premiums'];
}
