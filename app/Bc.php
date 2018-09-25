<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bc extends Model
{
    protected $fillable = ['company_id','member_id','dv','bc','bl','fc','deal_id','pu','tva','ttc','profit','taxes','print','buy','sale'];
}
