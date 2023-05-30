<?php

namespace App\Repositories;

use App\Company;


class CompanyRepositories
{
    public function pluck()
    {
        //return Company::orderBy('name')->pluck('name', 'id');
        $data = [];
        $companies = Company::orderBy('name')->get();
        foreach ($companies as $company) {
            $data[$company->id] = $company->name . " (" . $company->contacts()->count() . ")";
        }
        return $data;
    }
}
