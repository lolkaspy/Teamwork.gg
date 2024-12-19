<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_example(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $browser->visit('http://localhost:8000/login')
                ->assertSee('Вход')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Войти')
                ->assertPathIs('/home')
                ->visit('http://localhost:8000/profile')
                ->assertSee($user->login)
                ->screenshot('authTestCheckProfile');

        });
    }
}
