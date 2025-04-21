<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{


    public function test_user_can_register()
    {
        $this->browse(function (Browser $browser) {
            // Register
            $browser->visit('/register') // Visit ke halaman register
                ->type('name', 'Dusk User') // mengisi form nama
                ->type('email', 'cendekia@example.com') // Mengisi form email
                ->type('password', 'password') // Mengisi form Password
                ->type('password_confirmation', 'password') // Mengisi form Password
                ->press('REGISTER') // Tekan tombol register
                ->assertPathIs('/dashboard') // Cek apakah sudah masuk ke halaman dashboard
                ->press('Dusk User') // Tekan tombol Dusk User
                ->clickLink('Log Out'); // Tekan tombol Log Out
        });
    }
}
