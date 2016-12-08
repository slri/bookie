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
        factory(Bookie\Models\User::class, 10)->create()->each(function($user) {
        	$user->owns()->attach(range(1, 20));
        	$user->rents()->attach(range(30, 35));
        });

        factory(Bookie\Models\User::class, 10)->create()->each(function($user) {
        	$user->owns()->attach(range(13, 21));
        });

        factory(Bookie\Models\User::class, 10)->create()->each(function($user) {
        	$user->rents()->attach(range(3, 5));
        });
    }
}
