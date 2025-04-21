<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class EditNoteTest extends DuskTestCase
{
    

    public function test_user_can_edit_note()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/register')
            ->type('name', 'Dusk User')
            ->type('email', 'duskuser@example.com')
            ->type('password', 'password')
            ->type('password_confirmation', 'password')
            ->press('REGISTER')
            ->assertPathIs('/dashboard')
            ->press('Dusk User')
            ->clickLink('Log Out')
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
            ->assertPathIs('/')
            ->clickLink('Edit')
            ->assertPathBeginsWith('/notes/')
            ->type('title', 'Dusk Test Note Updated')
            ->type('content', 'Updated content by Dusk test.')
            ->press('Update')
            ->assertPathIs('/notes')               
            ->assertSee('Dusk Test Note Updated')
            ->clickLink('Log Out')
            ->assertPathIs('/');
        });
    }
}
