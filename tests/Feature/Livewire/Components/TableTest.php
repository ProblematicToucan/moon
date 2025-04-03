<?php

use App\Livewire\Components\Table;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Table::class)
        ->assertStatus(200);
});
