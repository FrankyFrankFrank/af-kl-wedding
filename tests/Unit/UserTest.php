<?php

namespace Tests\Unit;

use App\User;
use App\Wedding;
use App\Party;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function can_create_user() {
    	$user = factory(User::class)->create([
    		"name" => "Johnny Test",
    		"email" => "johnny@test.com"
		]);

    	$this->assertDataBaseHas('users', [
    		"name" => "Johnny Test",
    		"email" => "johnny@test.com"
		]);
    }

    /** @test **/
    public function can_add_user_to_party() {
        $user = factory(User::class)->create([
            "name" => "Johnny Test"
        ]);

        $party = factory(Party::class)->create([
            "name" => "The Tests",
            "rsvp_code" => 9999
        ]);

        $party->guests()->save($user);

        $this->assertEquals("Johnny Test", $party->guests()->first()->name);
    }


}
