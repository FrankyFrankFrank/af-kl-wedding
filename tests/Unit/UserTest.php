<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
}
