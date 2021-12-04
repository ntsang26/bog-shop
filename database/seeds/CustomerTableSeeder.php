<?php

use Illuminate\Database\Seeder;

use App\Models\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        for($i=1; $i<50; $i++){
            $customer = new Customer;
            $customer->customer_name = $faker->name;
            $customer->customer_email = $faker->unique()->email;
            $customer->customer_phone = $faker->tollFreePhoneNumber;
            $customer->customer_address = $faker->address;
            $customer->customer_city = $faker->city;
            $customer->save();
        }
    }
}
