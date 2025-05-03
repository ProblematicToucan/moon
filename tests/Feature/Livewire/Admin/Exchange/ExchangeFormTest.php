<?php

use App\Livewire\Admin\Exchange\ExchangeForm;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ExchangeForm::class)
        ->assertStatus(200);
});
