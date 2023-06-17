<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacts extends Model
{
    use SoftDeletes;
    //protected $table = 'table_name'
    //protected $id = '_id'
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id'];

    public function company()
    {

        return $this->belongsTo(Company::class, 'company_id');
    }
}
