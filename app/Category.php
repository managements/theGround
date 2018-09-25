<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category'];

    /**
     * ignore timestamp in this table.
     *
     * @var bool
     */
    public $timestamps = false;

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }
}
