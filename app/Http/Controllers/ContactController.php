<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $companies = [
            1 => ['name' => 'company one', 'contact' => 219],
            2 => ['name' => 'company two', 'contact' => 220],
            3 => ['name' => 'company three', 'contact' => 221],
            4 => ['name' => 'company four', 'contact' => 222],
            5 => ['name' => 'company five', 'contact' => 223],
            6 => ['name' => 'company six', 'contact' => 223],
        ];
        //$contacts = [];
        $contacts = $this->getContacts();
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
        $contacts = $this->getContacts();
        return view('contacts.status', compact('contacts', 'companies'));
    }

    public function show($id)
    {
        $contacts = $this->getContacts();
        abort_if(!isset($contacts[$id]), 404);
        $contact = $contacts[$id];
        return view('contacts.show')->with('contact', $contact);
    }


    public function create()
    {
        return view('contacts.create');
    }

    protected function getContacts()
    {
        return [
            1 => ['name' => 'Name 1', 'phone' => '1234567890', 'status' => 'pending'],
            2 => ['name' => 'Name 2', 'phone' => '2345678901', 'status' => 'pending'],
            3 => ['name' => 'Name 3', 'phone' => '3456789012', 'status' => 'completed'],
            4 => ['name' => 'Name 4', 'phone' => '3456789012', 'status' => 'pending'],
            5 => ['name' => 'Name 5', 'phone' => '1234567890', 'status' => 'pending'],
            6 => ['name' => 'Name 6', 'phone' => '2345678901', 'status' => 'completed'],
            7 => ['name' => 'Name 7', 'phone' => '3456789012', 'status' => 'pending'],
            8 => ['name' => 'Name 8', 'phone' => '3456789012', 'status' => 'completed'],
        ];
    }
}
