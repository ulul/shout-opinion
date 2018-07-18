<?php

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
        factory(App\Models\User::class, 6)->create()
	        ->each(function($user){
	        	$post = $user->posts()
		        	->save(factory(App\Models\Post::class)->make());
	        });
    }
}
