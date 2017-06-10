<?php

use Illuminate\Database\Seeder;

class PartiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $party = factory(App\Party::class, 3)
        	->create()
        	->each(function($party) {
        		$party->guests()->saveMany(factory(App\User::class, 3)->make());
        	});
    }
}
