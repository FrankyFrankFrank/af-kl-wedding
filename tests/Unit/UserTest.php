<?php

namespace Tests\Unit;

use App\User;
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
}
