<?php

namespace App\Forms\Components;

class TextInput
{
    protected string $component = 'form.text-input';
    protected string $name;
    protected array $options = [];
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->options = [
            'name' => $name,
            'label' => ucwords(str_replace('_', ' ', __($name))),
            'type' => 'text'
        ];
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

    public function label(string $label): static
    {
        $this->options['label'] = __($label);
        return $this;
    }

    public function type(string $type): static
    {
        $this->options['type'] = $type;
        return $this;
    }

    public function file(bool $multiple = false): static
    {
        $this->options['type'] = 'file';
        $this->options['multiple'] = $multiple;
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

    public function icon(string $icon, bool $trailing = false): static
    {
        if ($trailing) {
            $this->options['icon_trailing'] = $icon;
        } else {
            $this->options['icon'] = $icon;
        }
        return $this;
    }
}
