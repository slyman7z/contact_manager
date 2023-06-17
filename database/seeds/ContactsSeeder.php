<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Contacts;
use Faker\Factory as Faker;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();
        $faker = Faker::create();
        $contacts = [];

        foreach ($companies as $company) {

            foreach (range(1, 5) as $index) {
                $contact = [
                    'first_name' => $faker->firstName(),
                    'last_name' => $faker->lastName(),
                    'phone' => $faker->phoneNumber(),
                    'email' => $faker->email(),
                    'address' => $faker->address(),
                    'company_id' => Company::pluck('id')->random(),
                    'created_at' => now(),
                    'updated_at' => now(),

                ];
                $contacts = $contact;
            };
        }
        // DB::table('contacts')->delete();
        //DB::table('contacts')->insert($contacts);
        Contacts::create($contacts);
    }
}
