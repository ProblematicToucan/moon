<?php

namespace App\Livewire\Components;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithPagination;

abstract class Table extends Component
{
    use WithPagination;
    protected int $perPage = 10;
    protected string $model;
    public string $sortBy = '';
    public string $sortDirection = 'asc';
    public string $search = '';

    abstract public function query(): Builder;
    abstract public function columns(): array;
    abstract public function actions(): array;
    abstract protected function layout(): string;
    abstract protected function searchableColumns(): array;

    public function render(): View
    {
        return view($this->layout(), [
            'table' => $this->renderTable(),
            'model' => $this->getModel()
        ]);
    }

    private function renderTable(): string
    {
        return view('livewire.components.table', [
            'columns' => $this->columns(),
            'data' => $this->data(),
            'sortBy' => $this->sortBy,
            'sortDirection' => $this->sortDirection
        ])->render();
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
