<?php

namespace App\Forms\Components;

abstract class FormComponent
{
    protected string $component;
    protected string $name;
    protected array $options = [];

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->initializeOptions($name);
    }

    public static function make(string $name): static
    {
        return new static($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getComponent(): string
    {
        return $this->component;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    protected function initializeOptions(string $name): void
    {
        $this->options['name'] = $name;
        $this->options['label'] = ucwords(str_replace('_', ' ', __($name)));
    }

    public function label(string $label): static
    {
        $this->options['label'] = __($label);
        return $this;
    }

    public function description(string $description): static
    {
        $this->options['description'] = __($description);
        return $this;
    }
    
    public function placeholder(string $placeholder): static
    {
        $this->options['placeholder'] = __($placeholder);
        return $this;
    }
}