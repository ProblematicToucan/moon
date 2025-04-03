<?php

use App\Livewire\Admin\Users\UserList;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(UserList::class)
        ->assertStatus(200);
});
