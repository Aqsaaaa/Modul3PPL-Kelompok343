<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class CreateNoteTest extends DuskTestCase
{

    public function test_user_can_create_note()
    {
        $this->browse(function (Browser $browser) {

            $browser
                ->visit('/login')
                ->type('email', 'duskuser@example.com')
                ->type('password', 'password')
                ->press('LOG IN')
                ->assertPathIs('/dashboard')
                ->clickLink('Notes')
                ->clickLink('Create Note')
                ->assertPathIs('/create-note')
                ->type('title', 'Dusk Test Note')
                ->type('description', 'This is a note created by Laravel Dusk test.')
                ->press('CREATE')
                ->assertPathIs('/notes')
                ->assertSee('Dusk Test Note')
                ->press('Dusk User')
                ->clickLink('Log Out')
                ->assertPathIs('/');
        });
    }
}
