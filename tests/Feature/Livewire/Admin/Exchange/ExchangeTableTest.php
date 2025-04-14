<?php

use App\Livewire\Admin\Exchange\ExchangeTable;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ExchangeTable::class, ['model' => \App\Models\Exchange::class])
        ->assertOk();
});

it('has valid route', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    $this->get('/admin/exchange')->assertOk()->assertSeeLivewire(ExchangeTable::class);
});

it('returns correct searchable columns', function () {
    /** @var ExchangeTable $instance */
    $instance = Livewire::test(ExchangeTable::class, ['model' => \App\Models\Exchange::class])->instance();

    $columns = $instance->getSearchableColumns();
    expect($columns)->toBeArray()->tobe(['name', 'api_url']);
});

it('has actions', function () {
    /** @var ExchangeTable $instance */
    $instance = Livewire::test(ExchangeTable::class, ['model' => \App\Models\Exchange::class])->instance();

    $actions = $instance->getActions();
    expect($actions)->toBeArray();
});
