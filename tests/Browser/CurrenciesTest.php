<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CurrenciesTest extends DuskTestCase
{
    public function testGoToCurrencyPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies')
                ->assertSee('Bitcoin')
                ->clickLink('Bitcoin')
                ->assertPathIs('/currencies/1');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies')
                ->assertSee('Dogecoin')
                ->clickLink('Dogecoin')
                ->assertPathIs('/currencies/2');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies')
                ->assertSee('Litecoin')
                ->clickLink('Litecoin')
                ->assertPathIs('/currencies/3');
        });
    }

    public function testContainsLots()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies')
                ->assertSee('Bitcoin')
                ->clickLink('Bitcoin')
                ->assertPathIs('/currencies/1')
                ->assertSee('6631')
                ->assertSee('6633')
                ->assertSee('6636');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies')
                ->assertSee('Dogecoin')
                ->clickLink('Dogecoin')
                ->assertPathIs('/currencies/2')
                ->assertSee('0.002695')
                ->assertSee('0.0027')
                ->assertSee('0.00278');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies')
                ->assertSee('Litecoin')
                ->clickLink('Litecoin')
                ->assertPathIs('/currencies/3')
                ->assertSee('85')
                ->assertSee('84')
                ->assertSee('88');
        });
    }

    public function testLotsAreClickable() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies')
                ->assertSee('Bitcoin')
                ->clickLink('Bitcoin')
                ->click('6631')
                ->assertSee('6631')
                ->assertPathIs('/lots/1');

            $browser->visit('/currencies')
                ->assertSee('Dogecoin')
                ->clickLink('Dogecoin')
                ->click('0.0027')
                ->assertSee('0.0027')
                ->assertPathIs('/lots/5');

            $browser->visit('/currencies')
                ->assertSee('Litecoin')
                ->clickLink('Litecoin')
                ->click('88')
                ->assertSee('88')
                ->assertPathIs('/lots/9');
        });
    }
}
