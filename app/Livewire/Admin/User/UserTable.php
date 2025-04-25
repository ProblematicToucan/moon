<?php

namespace App\Livewire\Admin\User;

use App\Livewire\Components\Table;
use App\Models\User;

class UserTable extends Table
{
    protected string $layout = 'components.admin.exchange.exchange-list';
    public string $model = User::class;
    protected function query(): \Illuminate\Contracts\Database\Eloquent\Builder
    {
        return $this->getModel()::query();
    }

    protected function columns(): array
    {
        return [
            \App\Tables\Columns\TextColumn::make('name', 'Name')->sortable(),
            \App\Tables\Columns\TextColumn::make('email', 'Email')->sortable(),
            \App\Tables\Columns\TextColumn::make('created_at', 'Created At')->date()->sortable(),
        ];
    }

    protected function searchableColumns(): array
    {
        return ['name', 'email'];
    }

    protected function actions(): array
    {
        return [];
    }
}
