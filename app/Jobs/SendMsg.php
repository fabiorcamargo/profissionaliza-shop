<?php

namespace App\Jobs;

use App\Models\WppConnect;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendMsg implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $ph;
    protected $msg;
    protected $wpp;


    public function __construct($ph, $msg)
    {
        $this->ph = $ph;
        $this->msg = $msg;
        $this->wpp = WppConnect::first();

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $url = 'https://zap.profissionalizaead.com.br/api/wpp/send';

        $body = [
            'session' => $this->wpp->session,
            'phone' => $this->ph,
            'body' => $this->msg,
            'type' =>'chat',
            //'img' => "data:image/png;base64," . $this->imagem_1(),
            'group' => '0'
        ];

        //dd($body);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->wpp->token,
        ])->post($url, $body);
    }
}
