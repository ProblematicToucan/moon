<?php

use App\Livewire\Admin\Exchange\ExchangeCreate;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ExchangeCreate::class)
        ->assertStatus(200);
});
