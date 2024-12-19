<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ScrollToRecentProjectsTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function test_basic_example(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                ->script('window.scrollTo(0,350);');
            $browser->waitForText('Недавние проекты', 2)
                ->screenshot('findRecentProject');
        });
    }
}
