<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{

    public function test_user_can_login()
    {
        $this->browse(function (Browser $browser) {
            // Automatic Testing Login
                $browser 
                ->visit('/login')
                ->type('email', 'duskuser@example.com')
                ->type('password', 'password')
                ->press('LOG IN')
                ->assertPathIs('/dashboard')
                ->press('Dusk User')
                ->clickLink('Log Out');

                });
    }
}
