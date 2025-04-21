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
                ->visit('/login') // Visit ke halaman login
                ->type('email', 'duskuser@example.com') // Mengisi form email
                ->type('password', 'password') // Mengisi form Password
                ->press('LOG IN') // Tekan tombol login
                ->assertPathIs('/dashboard'); // Cek apakah sudah masuk ke halaman dashboard
                });
    }
}
