<?php

namespace App\Livewire\Components;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

abstract class Table extends Component
{
    use WithPagination;
    protected string $layout = 'components.layouts.app';
    protected int $perPage = 10;
    protected string $heading = '';
    protected string $subheading = '';
    #[Locked]
    protected string $model;
    public string $sortBy = '';
    public string $sortDirection = 'asc';
    public string $search = '';
    abstract protected function query(): Builder;
    abstract protected function columns(): array;
    abstract protected function actions(): array;
    abstract protected function searchableColumns(): array;
    abstract protected function pages(): array;
    public function render(): View
    {
        return view('livewire.components.table', [
            'columns' => $this->columns(),
            'data' => $this->data(),
            'sortBy' => $this->sortBy,
            'sortDirection' => $this->sortDirection
        ])->layout($this->layout, [
                    'heading' => $this->heading,
                    'subheading' => $this->subheading,
                    'model' => $this->getModel(),
                    'pages' => $this->pages()
                ]);
    }

    public function data(): LengthAwarePaginator
    {
        return $this
            ->query()
            ->when(!empty($this->search), function ($query) {
                $query->where(function ($subQuery) {
                    foreach ($this->searchableColumns() as $column) {
                        $subQuery->orWhere($column, 'like', "%{$this->search}%");
                    }
                });
            })
            ->when($this->sortBy !== '', function ($query) {
                $query->orderBy($this->sortBy, $this->sortDirection);
            })
            ->paginate($this->perPage);
    }

    public function getModel(): Model
    {
        return new $this->model;
    }

    public function setPerPage(int $perPage): void
    {
        $this->perPage = $perPage;
    }

    public function getSearchableColumns(): array
    {
        return $this->searchableColumns();
    }

    public function getActions(): array
    {
        return $this->actions();
    }

    public function sort($key)
    {
        $this->resetPage();

        if ($this->sortBy === $key) {
            if ($this->sortDirection === 'asc') {
                $this->sortDirection = 'desc';
            } elseif ($this->sortDirection === 'desc') {
                $this->sortBy = ''; // Reset sorting (unsorted)
                $this->sortDirection = 'asc'; // Default direction for next click
            }
        } else {
            $this->sortBy = $key;
            $this->sortDirection = 'asc';
        }
    }
}
