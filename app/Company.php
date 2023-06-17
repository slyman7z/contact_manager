<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model

{
    use SoftDeletes;
    //protected $guarded = [];
    protected $fillable = ['name', 'address', 'email', 'website'];
    public function contacts()
    {
        return  $this->hasMany(Contacts::class, 'company_id');
    }
}
