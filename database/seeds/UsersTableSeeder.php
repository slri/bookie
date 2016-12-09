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
        /*factory(Bookie\Models\User::class, 10)->create()->each(function($user) {
        	$user->owns()->saveMany(Bookie\Models\CarType::find(range(1, 20)));
        	$user->rents()->saveMany(Bookie\Models\CarType::find(range(30, 35)));
        });

        factory(Bookie\Models\User::class, 10)->create()->each(function($user) {
        	$user->owns()->saveMany(Bookie\Models\CarType::find(range(13, 21)));
        });

        factory(Bookie\Models\User::class, 10)->create()->each(function($user) {
        	$user->rents()->saveMany(Bookie\Models\CarType::find(range(3, 5)));
        });*/
        factory(Bookie\Models\User::class, 10)->create()->each(function($user) {
            $user->cars()->create(["cartype_id" => 1]);
        });
    }
}
