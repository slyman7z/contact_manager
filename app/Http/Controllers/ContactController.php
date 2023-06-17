<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CompanyRepositories;
use App\Contacts;
use App\Company;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    protected $company;

    public function __construct(CompanyRepositories $company)
    {
        $this->company =  $company;
    }

    public function index()
    {

        //$contacts = [];
        //$companies = $this->company->pluck();
        $companies = Company::orderBy('name')->pluck('name', 'id');


        DB::enableQueryLog(); //Debug technique
        //$contacts = Contacts::where('company_id', request()->query('company_id'))->paginate(3);
        $contacts = Contacts::where(
            function ($query) {
                //query for select filter
                if ($companyId = request()->query('company_id')) {
                    $query->where('company_id', $companyId);
                }
            }
        )->where(
            function ($query) {
                //query for search filter
                if ($search = request()->query('search')) {
                    $query->where('first_name', 'LIKE', "%{$search}%");
                    $query->orWhere('last_name', 'LIKE', "%{$search}%");
                    $query->orWhere('email', 'LIKE', "%{$search}%");
                }
            }
        )->paginate(10);

        dump(DB::getQueryLog());

        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {

        $companies = Company::orderBy('name')->pluck('name', 'id');
        $contact = new Contacts();
        return view('contacts.create', compact('companies', 'contact'));
    }

    public function store(Request $request)
    {
        // dd($request);
        //dd($request->only('address'));
        //dd($request->input('first_name'));
        //if ($request->has('first_name')) {
        //    dd(request()->first_name);
        // }
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'company_id' => 'required|exists:companies,id'
        ]);

        Contacts::create($request->input());
        return redirect()->route('contacts.index')->with('message', 'Contact has been added successfully');
    }

    public function show($id)
    {
        $contact = Contacts::findorFail($id);
        //abort_if(empty($contact), 404); 
        return view('contacts.show')->with('contact', $contact);
    }

    public function edit($id)
    {
        //$companies = $this->company->pluck();
        $companies = Company::orderBy('name')->pluck('name', 'id');
        $contact = Contacts::findorFail($id);
        //abort_if(empty($contact), 404); 
        return view('contacts.edit')->with('contact', $contact)->with('companies', $companies);
    }

    public function update(Request $request, $id)
    {

        $contact = Contacts::findorFail($id);
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'company_id' => 'required|exists:companies,id'
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been updated successfully');
    }

    public function destroy($id)
    {
        $contact = Contacts::findorFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('message', 'Contact has been removed successfully');
        //return back()->with('message', 'Contact has been removed succesffuly');
    }
}
