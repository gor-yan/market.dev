<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'Free',
            'surname' => 'Lancer',
            'userIdentity' => uniqid('user_'),
            'email' => 'free@admin.com',
            'password' => bcrypt('admin11'),
            'country' => 'Armenia (Հայաստան)',
            'country_iso' => 'am',
            'city' => 'city',
            'address1' => 'address1',
            'address2' => 'address2',
            'phone' => '123456798',
            'role' => 'freelancer',
            'account_status' => 'empty',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Hndik',
            'surname' => 'Client',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin11'),
            'country' => 'Armenia (Հայաստան)',
            'country_iso' => 'am',
            'city' => 'city',
            'address1' => 'address1',
            'address2' => 'address2',
            'phone' => '123456798',
            'role' => 'client',
            'account_status' => 'empty',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
