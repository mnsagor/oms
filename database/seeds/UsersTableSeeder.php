<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'approved'       => 1,
                'full_name'      => '',
                'father_name'    => '',
                'mother_name'    => '',
                'designation'    => '',
                'mobile'         => '',
                'salary'         => '',
            ],
        ];

        User::insert($users);
    }
}
