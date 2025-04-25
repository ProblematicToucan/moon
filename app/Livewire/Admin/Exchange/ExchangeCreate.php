<?php

namespace App\Livewire\Admin\Exchange;

use App\Livewire\Components\Form;

class ExchangeCreate extends Form
{
    public string $name = '';
    public string $logo = '';
    public string $api_url = '';
    public bool $is_active = true;
    protected function forms(): array
    {
        return [
            \App\Forms\Components\TextInput::make('name')
                ->description('The name of the exchange'),
            \App\Forms\Components\TextInput::make('logo')
                ->description('The url of the exchange logo'),
            \App\Forms\Components\TextInput::make('api_url')
                ->description('The url of the exchange api'),
            \App\Forms\Components\Toggle::make('is_active')
                ->label('Active')
                ->leftAlign(),
        ];
    }
}
