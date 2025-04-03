<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Components\Table;
use Livewire\Component;

class UserList extends Table
{
    protected string $model = \App\Models\User::class;
    public function layout(): string
    {
        return 'livewire.admin.users.user-list';
    }
    public function query(): \Illuminate\Database\Eloquent\Builder
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
    public function actions(): array
    {
        return [
            // \App\Table\Action::make('edit')
            //     ->label('Edit')
            //     ->icon('edit')
            //     ->link(fn($record) => route('admin.exchanges.edit', $record)),
            // \App\Table\Action::make('delete')
            //     ->label('Delete')
            //     ->icon('trash')
            //     ->link(fn($record) => route('admin.exchanges.destroy', $record))
            //     ->method('delete')
            //     ->confirm('Are you sure you want to delete this exchange?'),
        ];
    }
    public function searchableColumns(): array
    {
        return ['name', 'email'];
    }
}
