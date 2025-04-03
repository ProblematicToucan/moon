<?php

namespace App\Livewire\Admin\Exchanges;

use App\Livewire\Forms\Admin\Exchanges\ExchangeForm;
use App\Models\Exchange;
use Livewire\Component;

class ExchangeCreate extends Component
{
    public ExchangeForm $form;
    public function render()
    {
        return view('livewire.admin.exchanges.exchange-create');
    }

    public function save()
    {
        $this->validate();

        Exchange::create($this->form->all());

        return $this->redirectRoute('admin.exchange.index', navigate: true);
    }
}
