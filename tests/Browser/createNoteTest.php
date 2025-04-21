<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNoteTest extends DuskTestCase
{

    

    public function test_user_can_create_note()
    {
        $this->browse(function (Browser $browser) {

            $browser
                ->visit('/login') // Visit ke halaman login
                ->type('email', 'duskuser@example.com') // Mengisi form email
                ->type('password', 'password') // Mengisi form Password
                ->press('LOG IN') //Tekan tombol login 
                ->assertPathIs('/dashboard') // Cek apakah sudah masuk ke halaman dashboard
                ->clickLink('Notes') // Tekan tombol Notes
                ->clickLink('Create Note') // Tekan tombol Create
                ->assertPathIs('/create-note') // Cek apakah sudah masuk ke halaman notes
                ->type('title', 'Dusk Test Note') // Mengisi form email
                ->type('description', 'This is a note created by Laravel Dusk test.') // Mengisi form Password
                ->press('CREATE') // Tekan tombol Create
                ->assertPathIs('/notes') // Cek apakah sudah masuk ke halaman notes
                ->assertSee('Dusk Test Note'); // Cek apakah sudah masuk ke halaman notes
        });
    }
}
