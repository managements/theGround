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
    protected $table = 'premiums';

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function member()
    {
        return $this->hasOne(Member::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
