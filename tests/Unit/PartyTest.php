<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PartyTest extends TestCase
{
	use DatabaseMigrations;

    /** @test **/
    public function can_create_party() {
    	$party = factory(\App\Party::class)->create([
    		"name" => "The McTesters",
    		"rsvp_code" => 9999
		]);

    	$this->assertDataBaseHas('parties', [
    		"name" => "The McTesters",
    		"rsvp_code" => 9999
		]);
    }
}
