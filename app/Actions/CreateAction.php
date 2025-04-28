<?php

namespace App\Actions;

class CreateAction
{
    protected string $component = 'action.create';
    public function __construct()
    {
        //
    }

    public static function make(): static
    {
        return new static();
    }

    // Get component
    public function getComponent(): string
    {
        return $this->component;
    }
}
