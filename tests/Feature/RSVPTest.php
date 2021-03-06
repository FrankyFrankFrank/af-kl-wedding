<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Wedding;
use App\Party;

class RSVPTest extends TestCase
{
	use DatabaseMigrations;


    /** @test **/
	public function can_visit_rsvp_page() {
        $response = $this->get('/rsvp');

        $response->assertStatus(200);
    }

    /** @test **/
    public function user_can_be_invited_to_wedding() {
       	$user = factory(User::class)->create([
       		"name" => "Johnny Test",
       		"email" => "johnny@test.com"
   		]);

		$wedding = factory(Wedding::class)->create();

   		$wedding->invite($user);

   		$this->assertEquals('unresponded', $user->status);
   		$this->assertEquals($user->id, $wedding->invited->first()->id);
   		$this->assertEquals($user->name, $wedding->invited->first()->name);
   		$this->assertEquals($user->email, $wedding->invited->first()->email);
   		$this->assertEquals(null, $wedding->attending->first());

    }

    /** @test **/
    public function user_can_accept_invitation_to_wedding() {
    	$user = factory(User::class)->create([
    		"name" => "Johnny Test",
    		"email" => "johnny@test.com",
		]);

		$wedding = factory(Wedding::class)->create();
		$wedding->invite($user);

		$this->assertEquals('johnny@test.com', $wedding->invited->first()->email);
		$this->assertEquals('johnny@test.com', $wedding->unresponded->first()->email);

		$user->accept_invitation(2333);

		$this->assertEquals('johnny@test.com', $wedding->attending->first()->email);

    }

    /** @test **/
    public function user_can_decline_to_attend() {
    	$user = factory(User::class)->create([
    		"name" => "Johnny Test",
    		"email" => "johnny@test.com",
        ]);

		$wedding = factory(Wedding::class)->create();
		$wedding->invite($user);
   		$this->assertEquals($user->id, $wedding->invited->first()->id);

   		$user->decline_invitation(2333);
   		$this->assertEquals($user->id, $wedding->declined->first()->id);

    }

    /** @test **/
    public function can_select_guest_entree() {
        $guest = factory(User::class)->create();
        $party = factory(Party::class)->create();

        $party->guests()->save($guest);

        $response = $this->json('POST', '/rsvp/' . $party->id);

        $response->assertStatus(200);
    }


}
