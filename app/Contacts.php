<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    //protected $table = 'table_name'
    //protected $id = '_id'
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address'];
    public function company()
    {

        return $this->belongsTo(Company::class, 'company_id');
    }
}
