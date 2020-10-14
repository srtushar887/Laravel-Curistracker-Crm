<?php

namespace Database\Seeders;

use App\Models\AccountManager;
use App\Models\Admin;
use App\Models\BaseStaff;
use App\Models\Mis;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $faker = Faker::create();

        foreach (range(1,200) as $index){

            $admin = new Admin();
            $admin->name = $faker->name;
            $admin->email = $faker->email;
            $admin->phone_number = $faker->phoneNumber;
            $admin->password = Hash::make('12345678');
            $admin->show_pass = '12345678';
            $admin->account_status = 1;
            $admin->account_type = 1;
            $admin->save();


            $acc_m = new AccountManager();
            $acc_m->name = $faker->name;
            $acc_m->email = $faker->email;
            $acc_m->phone_number = $faker->phoneNumber;
            $acc_m->password = Hash::make('12345678');
            $acc_m->show_pass = '12345678';
            $acc_m->account_status = 1;
            $acc_m->account_type = 2;
            $acc_m->save();

            $base = new BaseStaff();
            $base->name = $faker->name;
            $base->email = $faker->email;
            $base->phone_number = $faker->phoneNumber;
            $base->password = Hash::make('12345678');
            $base->show_pass = '12345678';
            $base->account_status = 1;
            $base->account_type = 3;
            $base->save();

            $mis = new Mis();
            $mis->name = $faker->name;
            $mis->email = $faker->email;
            $mis->phone_number = $faker->phoneNumber;
            $mis->password = Hash::make('12345678');
            $mis->show_pass = '12345678';
            $mis->account_status = 1;
            $mis->account_type = 4;
            $mis->save();




        }


    }
}
