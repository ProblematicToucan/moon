<?php

namespace App\Forms\Components;

class Toggle
{
    protected string $component = 'form.toggle';
    protected string $name;
    protected array $options = [];
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->options = [
            'name' => $name,
            'label' => ucwords(str_replace('_', ' ', __($name))),
        ];
    }

    // static make function
    public static function make(string $name): static
    {
        return new static($name);
    }

    // getName function
    public function getName(): string
    {
        return $this->name;
    }

    // getComponent function
    public function getComponent(): string
    {
        return $this->component;
    }

    // getOptions function
    public function getOptions(): array
    {
        return $this->options;
    }

    // label function
    public function label(string $label): self
    {
        $this->options['label'] = __($label);
        return $this;
    }

    // align option function
    public function leftAlign(): self
    {
        $this->options['align'] = 'left';
        return $this;
    }
}
