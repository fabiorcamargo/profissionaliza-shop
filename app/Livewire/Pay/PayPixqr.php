<?php

namespace App\Livewire\Pay;

use App\Jobs\CheckPay;
use Livewire\Component;
use splitbrain\phpQRCode\QRCode;

class PayPixqr extends Component
{
    public $order;
    public $pix;
    public $copycode;

    public function mount(){

        $this->message = $this->order->status;
        $this->pix = json_decode($this->order->response);  
        $this->copycode = $this->pix->payload;
        
    }

    public function render()
    {
        return view('livewire.pay.pay-pixqr');
    }
}
