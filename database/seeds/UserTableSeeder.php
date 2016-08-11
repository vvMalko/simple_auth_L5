<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add the master administrator, user id of 1
        $users = [
            [
                'name'              => 'Admin',
                'email'             => 'admin@admin.com',
                'password'          => bcrypt('1234'),
                'status'            => 100,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'name'              => 'User',
                'email'             => 'user@user.com',
                'password'          => bcrypt('1234'),
                'status'            => 0,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
