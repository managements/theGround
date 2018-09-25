<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['token', 'range', 'category_id', 'company_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
