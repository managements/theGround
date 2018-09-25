<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['position', 'first_name', 'last_name', 'comment', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
