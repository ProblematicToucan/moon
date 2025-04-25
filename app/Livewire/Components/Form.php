<?php

namespace App\Livewire\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Locked;
use Livewire\Component;

abstract class Form extends Component
{
    #[Locked]
    public string $model;
    public Model $record;
    abstract protected function forms(): array;
    public function render(): View
    {
        return view('livewire.components.form', [
            'forms' => $this->forms(),
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

    public function update(): void
    {
        $this->validate();

        $this->getModel()->update($this->all());

        $this->dispatch('update');
    }
}
