<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //protected $guarded = [];
    protected $fillable = ['name', 'address', 'email', 'website'];
    public function contacts()
    {
        return  $this->hasMany(Contacts::class, 'company_id');
    }
}
