<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CompanyRepositories;
use App\Contacts;

class ContactController extends Controller
{
    protected $company;
    public function __construct(CompanyRepositories $company)
    {
        $this->company =  $company;
    }
    public function index()
    {
        //  $companies = [
        //    1 => ['name' => 'company one', 'contact' => 219],
        //    2 => ['name' => 'company two', 'contact' => 220],
        //    3 => ['name' => 'company three', 'contact' => 221],
        //    4 => ['name' => 'company four', 'contact' => 222],
        //    5 => ['name' => 'company five', 'contact' => 223],
        //    6 => ['name' => 'company six', 'contact' => 223],
        //];
        //$contacts = [];
        $companies = $this->company->pluck();
        //$contacts = $this->getContacts();
        $contacts = Contacts::latest()->get();
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function status()
    {
        $companies = [
            1 => ['name' => 'company one', 'contact' => 219],
            2 => ['name' => 'company two', 'contact' => 220],
            3 => ['name' => 'company three', 'contact' => 221],
            4 => ['name' => 'company four', 'contact' => 222],
            5 => ['name' => 'company five', 'contact' => 223]
        ];
        // $contacts = []; //getContacts();
        //$contacts = $this->getContacts();
        return view('contacts.status', compact('companies'));
    }

    public function show($id)
    {
        $contact = Contacts::findorFail($id);
        //abort_if(empty($contact), 404);

        return view('contacts.show')->with('contact', $contact);
    }
    public function create()
    {
        return view('contacts.create');
    }
}
