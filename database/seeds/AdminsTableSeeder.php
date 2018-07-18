<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('admins')->insert([
            'email' => 'admin@blog.com',
            'password' => bcrypt('secret'),
            'name' => 'Administrator',
        ]);
    }
}
