<?php

use App\Livewire\Admin\Exchanges\ExchangeList;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ExchangeList::class)
        ->assertStatus(200);
});
