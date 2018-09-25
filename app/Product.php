<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'ref', 'tva', 'description', 'size', 'qt', 'amount_min', 'amount_max', 'company_id'];
}
