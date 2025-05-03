<?php

namespace App\Livewire\Admin\Exchange;

use App\Actions\CancelAction;
use App\Actions\CreateAction;
use App\Actions\DeleteAction;
use App\Actions\EditAction;
use App\Forms\Components\TextInput;
use App\Forms\Components\Toggle;
use App\Livewire\Components\Form;
use App\Models\Exchange;
use Illuminate\Validation\Rule;

class ExchangeForm extends Form
{
    protected const ROUTE = 'admin.exchange';
    protected string $layout = 'components.admin.exchange.exchange';
    protected string $heading = 'Exchange';
    protected string $subheading = 'Create exchange application resources';
    protected string $model = Exchange::class;
    public string $name = '';
    public string $logo = '';
    public string $api_url = '';
    public bool $is_active = true;

    protected function rules(): array
    {
        $id = $this->record->id ?? null;

        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('exchanges', 'name')->ignore($id)],
            'logo' => ['nullable', 'string'],
            'api_url' => ['required', 'url', Rule::unique('exchanges', 'api_url')->ignore($id)],
            'is_active' => ['boolean'],
        ];
    }
    protected function forms(): array
    {
        return [
            TextInput::make('name')
                ->description('The name of the exchange')
                ->placeholder('Enter exchange name'),

            TextInput::make('logo')
                ->description('The URL of the exchange logo')
                ->placeholder('Enter logo URL')
                ->type('url'),

            TextInput::make('api_url')
                ->description('The URL of the exchange API')
                ->placeholder('Enter API URL')
                ->type('url'),

            Toggle::make('is_active')
                ->label('Active')
                ->leftAlign(),
        ];
    }

    protected function actions(): array
    {
        return match ($this->action) {
            'create' => [
                CreateAction::make(),
                CancelAction::make()
            ],
            default => [
                EditAction::make(),
                CancelAction::make(),
                DeleteAction::make(),
            ],
        };
    }
}
