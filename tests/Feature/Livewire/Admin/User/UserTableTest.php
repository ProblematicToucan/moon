<?php

use App\Livewire\Admin\User\UserTable;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(UserTable::class, ['model' => \App\Models\User::class])
        ->assertOk();
});

it('has valid route', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    $this->get('/admin/user')->assertOk()->assertSeeLivewire(UserTable::class);
});

it('returns correct searchable columns', function () {
    /** @var UserTable $instance */
    $instance = Livewire::test(UserTable::class, ['model' => \App\Models\User::class])->instance();

    $columns = $instance->getSearchableColumns();
    expect($columns)->toBeArray()->toBe(['name', 'email']);
});

it('has actions', function () {
    /** @var UserTable $instance */
    $instance = Livewire::test(UserTable::class, ['model' => \App\Models\User::class])->instance();

    $actions = $instance->getActions();
    expect($actions)->toBeArray();
});
