<?php

namespace App\Livewire\Admin\Exchange;

use App\Livewire\Components\Table;

class ExchangeTable extends Table
{
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
}
