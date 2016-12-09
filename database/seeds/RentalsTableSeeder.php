<?php

use Illuminate\Database\Seeder;

class RentalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Bookie\Models\Rental::class, 20)->create();
    }
}
