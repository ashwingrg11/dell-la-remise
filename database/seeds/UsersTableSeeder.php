<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::updateOrCreate(
           ['email' =>'dellcashback@gmail.com'],
           [
                'name' => 'Cashback Super Admin',
                'password' => bcrypt('password@1'),
                'role' => 'super-admin',
            ]
        );
    }
}
