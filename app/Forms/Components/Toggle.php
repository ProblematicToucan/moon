<?php

namespace App\Forms\Components;

class Toggle extends FormComponent
{
    protected string $component = 'form.toggle';

    public function leftAlign(): static
    {
        $this->options['align'] = 'left';
        return $this;
    }
}