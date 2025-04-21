<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewNoteTest extends DuskTestCase
{

    

    public function test_user_can_view_note()
    {
        $this->browse(function (Browser $browser) {

            $browser
                ->visit('/login') // Visit ke halaman login
                ->type('email', 'duskuser@example.com') // Mengisi form email
                ->type('password', 'password') // Mengisi form Password
                ->press('LOG IN') // Tekan tombol login
                ->assertPathIs('/dashboard') // Cek apakah sudah masuk ke halaman dashboard
                ->clickLink('Notes') // Tekan tombol Notes
                ->assertPathIs('/notes'); // Cek apakah sudah masuk ke halaman notes
        });
    }
}
