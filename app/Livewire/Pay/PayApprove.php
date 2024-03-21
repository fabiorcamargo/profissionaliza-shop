<?php

namespace App\Livewire\Pay;

use Livewire\Component;

class PayApprove extends Component
{
    public $order;
    public $message;

    public function mount(){
        $this->message = $this->order->status;
    }


    public function render()
    {
        return view('livewire.pay.pay-approve');
    }
}
