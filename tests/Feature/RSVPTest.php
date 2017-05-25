<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Wedding;

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
            "rsvp_number" => 2333
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
            "rsvp_number" => 2333
        ]);

		$wedding = factory(Wedding::class)->create();
		$wedding->invite($user);
   		$this->assertEquals($user->id, $wedding->invited->first()->id);

   		$user->decline_invitation(2333);
   		$this->assertEquals($user->id, $wedding->declined->first()->id);

    }

    public function test_user_must_submit_rsvp_code_to_accept()
    {
        $user = factory(User::class)->create([
            "name" => "Johnny Test",
            "email" => "johnny@test.com",
            "rsvp_number" => 2333
        ]);

        $wedding = factory(Wedding::class)->create();
        $wedding->invite($user);
        $this->assertEquals($user->id, $wedding->invited->first()->id);

        $user->accept_invitation(9999);

        $this->assertNull($wedding->attending->first());
    }

    public function test_user_must_submit_rsvp_code_to_decline()
    {
        $user = factory(User::class)->create([
            "name" => "Johnny Test",
            "email" => "johnny@test.com",
            "rsvp_number" => 2333
        ]);

        $wedding = factory(Wedding::class)->create();
        $wedding->invite($user);
        $this->assertEquals($user->id, $wedding->invited->first()->id);

        $user->decline_invitation(9999);

        $this->assertNull($wedding->declined->first());
    }

    public function test_user_can_log_in_with_code()
    {
        $user = factory(User::class)->make([
            "name" => "Johnny Test",
            "email" => "johnny@tests.com",
            "rsvp_number" => 2333
        ]);

        $wedding = factory(Wedding::class)->create();
        $wedding->invite($user);

        $response = $this->json('POST','/rsvp', [
            'firstname' => 'Johnny',
            'lastname' => 'Test',
            'rsvp_number' => 2333
        ]);

        $response->assertStatus(200)
            ->assertViewHas('guest');
    }


}
