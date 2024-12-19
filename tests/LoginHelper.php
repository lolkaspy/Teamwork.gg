<?php

namespace Tests;

use App\Models\User;
use Laravel\Dusk\Browser;

class LoginHelper
{
    public static function loginAs(Browser $browser, User $user): Browser
    {
        $browser->visit('http://localhost:8000/login')
            ->assertSee('Вход')
            ->type('email', $user->email)
            ->type('password', 'password')
            ->press('Войти')
            ->screenshot('dusklogin');

        return $browser;
    }
}
