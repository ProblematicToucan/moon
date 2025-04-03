<?php

namespace App\Table;

class TextColumn
{
    protected string $component = 'table.text-column';
    protected string $key;
    protected string $label;
    protected array $options = [];
    public function __construct(string $key, string $label)
    {
        $this->key = $key;
        $this->label = $label;
    }

    public static function make(string $key, string $label): self
    {
        return new self($key, $label);
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getComponent(): string
    {
        return $this->component;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function date(bool $diffForHuman = false): static
    {
        $this->component = 'table.text-column';
        $this->options['diffForHuman'] = $diffForHuman;
        return $this;
    }

    public function badge(): static
    {
        $this->options['badge'] = true;
        return $this;
    }

    public function color(callable $callback): static
    {
        $this->options['color'] = $callback;
        return $this;
    }

    public function sortable(): static
    {
        $this->options['sortable'] = true;
        return $this;
    }
}
