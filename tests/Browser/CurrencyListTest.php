<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CurrencyListTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testSeeHeader()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies')
                ->assertTitleContains('Currency market')
                ->assertSee('Currency market');
        });
    }

    public function testSeeCurrencies()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies')
                ->assertSee('Bitcoin')
                ->assertSee('Dogecoin')
                ->assertSee('Litecoin');
        });
    }

    public function testGoToCurrencyPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies')
                ->assertSee('Bitcoin')
                ->clickLink('Bitcoin')
                ->assertPathIs('/currencies/1')
                ->assertSee('The currency page');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies')
                ->assertSee('Dogecoin')
                ->clickLink('Bitcoin')
                ->assertPathIs('/currencies/2')
                ->assertSee('The currency page');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies')
                ->assertSee('Litecoin')
                ->clickLink('Litecoin')
                ->assertPathIs('/currencies/3')
                ->assertSee('The currency page');
        });
    }
}
