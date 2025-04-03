<?php

use App\Livewire\Admin\Exchanges\ExchangeCreate;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ExchangeCreate::class)
        ->assertStatus(200);
});
