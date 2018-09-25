<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['face', 'name', 'first_name', 'last_name', 'birth', 'address', 'city_id', 'premium_id', 'category_id', 'user_id', 'company_id'];

    public function email()
    {
        return $this->hasOne(Email::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function premium()
    {
        return $this->belongsTo(Premium::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tel()
    {
        return $this->hasOne(Tel::class);
    }
}
