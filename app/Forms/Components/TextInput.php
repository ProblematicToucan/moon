<?php

namespace App\Forms\Components;

class TextInput extends FormComponent
{
    protected string $component = 'form.text-input';

    protected function initializeOptions(string $name): void
    {
        parent::initializeOptions($name);
        $this->options['type'] = 'text';
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