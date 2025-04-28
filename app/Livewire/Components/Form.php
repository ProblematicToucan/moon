<?php

namespace App\Livewire\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Locked;
use Livewire\Component;

abstract class Form extends Component
{
    protected string $layout = 'components.layouts.app';
    protected string $heading = '';
    protected string $subheading = '';
    #[Locked]
    protected string $model = '';
    #[Locked]
    public Model $record;
    public string $action = 'create'; // Default action
    abstract protected function forms(): array;
    abstract protected function actions(): array;
    public function mount()
    {
        $this->action = request()->routeIs('*.create') ? 'create' : 'edit';
    }
    public function render(): View
    {
        return view('livewire.components.form', [
            'forms' => $this->forms(),
            'actions' => $this->actions(),
        ])->layout($this->layout, [
                    'heading' => $this->heading,
                    'subheading' => $this->subheading,
                ]);
    }

    public function getModel(): Model
    {
        if (!class_exists($this->model)) {
            throw new \Exception("Model {$this->model} not found");
        }

        return new $this->model;
    }

    public function setRecord(Model $record)
    {
        $this->record = $record;
        $this->fill($record->toArray());
    }

    public function create(): void
    {
        $this->validate();

        $this->getModel()->create($this->all());

        $this->dispatch('create');
    }

    public function edit(): void
    {
        $this->validate();

        $this->getModel()->update($this->all());

        $this->dispatch('update');
    }

    public function delete(): void
    {
        $this->getModel()->delete();

        $this->dispatch('delete');
    }
}
