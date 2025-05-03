<?php

namespace App\Livewire\Admin\Exchange;

use App\Livewire\Components\Table;
use App\Models\Exchange;

class ExchangeTable extends Table
{
    protected const ROUTE = 'admin.exchange';
    protected string $layout = 'components.admin.exchange.exchange';
    protected string $heading = 'Exchange';
    protected string $subheading = 'Manage exchange application resources';
    public string $model = Exchange::class;
    protected function query(): \Illuminate\Contracts\Database\Eloquent\Builder
    {
        return $this->getModel()::query();
    }

    protected function columns(): array
    {
        return [
            \App\Tables\Columns\TextColumn::make('name', 'Name')->sortable(),
            \App\Tables\Columns\TextColumn::make('api_url', 'Url')->sortable(),
        ];
    }

    protected function searchableColumns(): array
    {
        return ['name', 'api_url'];
    }

    protected function actions(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [
            'create' => 'admin.exchange.create'
        ];
    }
}
