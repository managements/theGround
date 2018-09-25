<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status'];

    /**
     * ignore timestamp in this table.
     *
     * @var bool
     */
    public $timestamps = false;

    public function premiums()
    {
        return $this->hasMany(Premium::class);
    }
}
