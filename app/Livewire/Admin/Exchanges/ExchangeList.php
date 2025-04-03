<?php

namespace App\Livewire\Admin\Exchanges;

use App\Livewire\Components\Table;
use Livewire\Component;

class ExchangeList extends Table
{
    protected string $model = \App\Models\Exchange::class;
    public function layout(): string
    {
        return 'livewire.admin.exchanges.exchange-list';
    }

    public function query(): \Illuminate\Contracts\Database\Eloquent\Builder
    {
        return $this->getModel()::query();
    }

    public function columns(): array
    {
        return [
            \App\Table\TextColumn::make('name', 'Name')->sortable(),
            \App\Table\TextColumn::make('is_active', 'Active')->badge(),
            \App\Table\TextColumn::make('created_at', 'Created At')->date(),
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
        return ['name'];
    }
}
