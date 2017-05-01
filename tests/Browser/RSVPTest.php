<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\User; 
use App\Wedding;

class RSVPTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    public function setUp()
    {
        parent::setUp();
        $user = factory(User::class)->create([
            'name' => 'Johnny Test',
            'email' => 'johnny@test.com',
        ]);
        $wedding = factory(Wedding::class)->create();
        $wedding->invite($user);
    }

    /** @test **/
    public function user_can_rsvp_to_wedding()
    {
        $this->browse(function($browser) use ($user, $wedding){
            $browser->visit('/rsvp')
                ->press('RSVP')
                ->assertSee('Success');
        });
    }
}
