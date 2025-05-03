<?php

namespace App\Livewire\Components;

use Flux\Flux;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Locked;
use Livewire\Component;

abstract class Form extends Component
{
    protected const ROUTE = ''; // Should be overridden in subclasses
    protected string $layout = 'components.layouts.app';
    protected string $heading = '';
    protected string $subheading = '';

    #[Locked]
    protected string $model = '';

    #[Locked]
    public ?Model $record = null;

    public string $action = 'create';
    public string $route;

    abstract protected function rules(): array;
    abstract protected function forms(): array;
    abstract protected function actions(): array;

    public static function route(): string
    {
        if (static::ROUTE === '') {
            throw new \LogicException('ROUTE constant must be defined in subclass of Form.');
        }

        return static::ROUTE;
    }

    public function mount(?int $id = null): void
    {
        $this->action = request()->routeIs('*.create') ? 'create' : 'edit';
        $this->route = static::route();

        if ($this->action === 'edit') {
            if (!$id) {
                throw new \InvalidArgumentException("Missing ID for editing.");
            }

            $record = $this->getModel()::findOrFail($id);
            $this->setRecord($record);
        } else {
            $this->record = null; // ensure it’s set for `rules()`
        }
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
            throw new \RuntimeException("Model class '{$this->model}' does not exist.");
        }

        return new $this->model;
    }

    public function setRecord(Model $record): void
    {
        $this->record = $record;
        $this->fill($record->toArray());
    }

    public function create(): void
    {
        $this->validate();

        $record = $this->getModel()->create($this->all());

        $this->dispatch('create');
        Flux::toast('Your changes have been saved.');

        $this->redirectRoute(static::route() . '.edit', $record->id, navigate: true);
    }

    public function edit(): void
    {
        $this->validate();
        $this->record->update($this->all());

        $this->dispatch('update');
        Flux::toast('Your changes have been saved.');
    }

    public function delete(): void
    {
        $this->record->delete();

        $this->dispatch('delete');
        Flux::toast('The record has been deleted.');

        $this->redirectRoute(static::route() . '.index', navigate: true);
    }
}
