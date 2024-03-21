<?php

namespace App\Livewire\Filament\Client\Pages;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $this->dispatch('open-modal', id: 'show-slide');
        return view('livewire.filament.client.pages.dashboard');
    }
}
