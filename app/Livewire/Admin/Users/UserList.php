<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Components\Table;
use Livewire\Component;

class UserList extends Table
{
    public function layout(): string
    {
        return 'livewire.admin.users.user-list';
    }
    public function query(): \Illuminate\Database\Eloquent\Builder
    {
        return \App\Models\User::query();
    }
    public function columns(): array
    {
        return [
            \App\Table\TextColumn::make('name', 'Name')->sortable(),
            \App\Table\TextColumn::make('email', 'Email')->sortable(),
            \App\Table\TextColumn::make('created_at', 'Created At')->date()->sortable(),
        ];
    }
    public function searchableColumns(): array
    {
        return ['name', 'email'];
    }
}
