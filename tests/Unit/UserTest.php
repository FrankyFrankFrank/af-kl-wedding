<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Wedding;
use App\User;

class UserTest extends TestCase
{
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

        use DatabaseMigrations;


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
            "email" => "johnny@test.com"
        ]);

        $wedding = factory(Wedding::class)->create();
        $wedding->invite($user);

        $this->assertEquals('johnny@test.com', $wedding->invited->first()->email);
        $this->assertEquals('johnny@test.com', $wedding->unresponded->first()->email);

        $user->accept_invitation();

        $this->assertEquals('johnny@test.com', $wedding->attending->first()->email);

    }

    /** @test **/
    public function user_can_decline_to_attend() {
        $user = factory(User::class)->create([
            "name" => "Johnny Test",
            "email" => "johnny@test.com"
        ]);

        $wedding = factory(Wedding::class)->create();
        $wedding->invite($user);
        $this->assertEquals('johnny@test.com', $wedding->invited->first()->email);

        $user->decline_invitation();
        $this->assertEquals('johnny@test.com', $wedding->declined->first()->email);

    }
}
