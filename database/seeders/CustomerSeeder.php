<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
    {
        Customer::create([
            'name' => 'John Doe',
            'address' => '123 Main St',
            'mobile_no' => '123456789',
            'email' => 'johndoe@example.com',
            'vat_no' => 'VAT123',
            'cr_no' => 'CR456',
            'zip_code' => '12345',
            'country' => 'USA',
            'balance' => 100.50,
        ]);
    }
}
