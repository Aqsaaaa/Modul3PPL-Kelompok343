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
            $browser 
                ->visit('/login') // Visit ke halaman login
                ->type('email', 'duskuser@example.com') // Mengisi form email
                ->type('password', 'password') // Mengisi form Password
                ->press('LOG IN') // Tekan tombol login
                ->assertPathIs('/dashboard') // Cek apakah sudah masuk ke halaman dashboard
                ->press('Dusk User') // Tekan tombol Dusk User
                ->clickLink('Log Out'); // Tekan tombol Log Out
        });
    }
}
