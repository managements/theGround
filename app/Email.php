<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['email', 'deal_id', 'position_id', 'member_id', 'company_id'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }
}
