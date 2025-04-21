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

            $browser->visit('/login') // Visit ke halaman login
            ->type('email', 'duskuser@example.com') // Mengisi form email
            ->type('password', 'password') // Mengisi form Password
            ->press('LOG IN') // Tekan tombol login
            ->assertPathIs('/dashboard') // Cek apakah sudah masuk ke halaman dashboard
            ->clickLink('Notes') // Tekan tombol Notes
            ->assertPathIs('/notes') // Cek apakah sudah masuk ke halaman notes
            ->assertSee('Dusk Test Note')// Cek apakah sudah masuk ke halaman notes
            ->clickLink('Edit')// Tekan tombol Edit
            ->assertPathBeginsWith('/edit-note-page/') // Cek apakah sudah masuk ke halaman notes
            ->press("")// Tekan tombol Edit (initial)
            ->type('title', 'Dusk Test Note Updated') // Mengisi form email
            ->type('description', 'Updated content by Dusk test.') // Mengisi form Password
            ->press('UPDATE') // Tekan tombol Update
            ->assertPathIs('/notes')// Cek apakah sudah masuk ke halaman notes
            ->assertSee('Dusk Test Note Updated'); // Cek apakah sudah masuk ke halaman notes
        });
    }
}
