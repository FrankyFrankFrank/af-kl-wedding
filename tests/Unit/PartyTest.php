<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Party;

class PartyTest extends TestCase
{
	use DatabaseMigrations;

    /** @test **/
    public function can_create_party() {
    	$party = factory(Party::class)->create([
    		"name" => "The McTesters",
    		"rsvp_code" => 9999
		]);

    	$this->assertDataBaseHas('parties', [
    		"name" => "The McTesters",
    		"rsvp_code" => 9999
		]);
    }

    public function test_party_can_log_in_with_code()
    {
        $party = factory(Party::class)->create([
            "name" => "The McTesters",
            "rsvp_code" => 2333
        ]);
        
        $response = $this->json('POST','/rsvp', [
            'rsvp_code' => $party->rsvp_code
        ]);

        $response->assertRedirect('/rsvp/'. $party->id);
    }
}
