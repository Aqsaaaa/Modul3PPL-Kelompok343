<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    

    public function test_user_can_register()
    {
        $this->browse(function (Browser $browser) {
            // Register
            $browser->visit('/register')
                ->type('name', 'Dusk User')
                ->type('email', 'duskuser@example.com')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->press('REGISTER')
                ->assertPathIs('/dashboard')
                ->press('Dusk User')
                ->clickLink('Log Out');
        });
    }
}
