<?php

namespace App\Livewire\Admin\User;

use App\Livewire\Components\Table;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class UserTable extends Table
{
    public function query(): \Illuminate\Contracts\Database\Eloquent\Builder
    {
        return $this->getModel()::query();
    }

    public function columns(): array
    {
        return [
            \App\Tables\Columns\TextColumn::make('name', 'Name')->sortable(),
            \App\Tables\Columns\TextColumn::make('email', 'Email')->sortable(),
            \App\Tables\Columns\TextColumn::make('created_at', 'Created At')->date()->sortable(),
        ];
    }

    public function searchableColumns(): array
    {
        return ['name', 'email'];
    }

    public function actions(): array
    {
        return [];
    }
}
