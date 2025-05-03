<?php

namespace App\Actions;

abstract class Action
{
    protected string $component;
    
    public static function make(): static
    {
        return new static();
    }

    public function getComponent(): string
    {
        return $this->component;
    }
}