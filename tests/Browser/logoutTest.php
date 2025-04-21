<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    

    public function test_user_can_logout()
    {
        $this->browse(function (Browser $browser) {
            //Automatic Testing Logout 
            $browser->clickLink('Logout')
                ->assertPathIs('/');
        });
    }
}
