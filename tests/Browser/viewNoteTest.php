<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class ViewNoteTest extends DuskTestCase
{
    

    public function test_user_can_register_login_create_edit_view_delete_note_and_logout()
    {
        $this->browse(function (Browser $browser) {
            // Login
            $browser->visit('/login')
                ->type('email', 'duskuser@example.com')
                ->type('password', 'password')
                ->press('Log in')
                ->assertPathIs('/dashboard');

            // Create Note
            $browser->visit('/create-notes')
                ->type('title', 'Dusk Test Note')
                ->type('content', 'This is a note created by Laravel Dusk test.')
                ->press('Save')
                ->assertPathIs('/notes')
                ->assertSee('Dusk Test Note');

            // Edit Note
            $browser->clickLink('Edit')
                ->assertPathBeginsWith('/notes/')
                ->type('title', 'Dusk Test Note Updated')
                ->type('content', 'Updated content by Dusk test.')
                ->press('Update')
                ->assertPathIs('/notes')
                ->assertSee('Dusk Test Note Updated');

            // View Note Detail
            $browser->clickLink('Dusk Test Note Updated')
                ->assertSee('Updated content by Dusk test.');


            // Logout
            $browser->clickLink('Logout')
                ->assertPathIs('/');
        });
    }
}
