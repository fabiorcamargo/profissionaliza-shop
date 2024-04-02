<?php

namespace App\Jobs;

use App\Events\SuccessPayEvent;
use App\Models\AsaasAccount;
use App\Models\BillingType;
use App\Models\UserOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;

class CheckPix implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    public $token;
    public $userOrder;


    /**
     * Create a new job instance.
     */
    public function __construct(UserOrder $userOrder)
    {

        $this->userOrder = $userOrder;
        $this->token = AsaasAccount::find($userOrder->asaas_account_id)->token;

    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if(env('ASAAS_TYPE') == 'DEV'){
            $url = 'https://sandbox.asaas.com/api/v3/';
         }else if(env('ASAAS_TYPE') == 'PROD'){
            $url = 'https://api.asaas.com/v3/';
         }

        try {
            // Fazer uma requisição POST para criar o cliente Asaas
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'access_token' => $this->token,
            ])->post($url . 'payments/'. $this->userOrder->payment_id .'/pixQrCode');

            // Verificar se a requisição foi bem-sucedida (código de status 2xx)
            if ($response->successful()) {
                // Se for bem-sucedida, obter o conteúdo da resposta
                $content = $response->json();

                $this->userOrder->response = $content;
                $this->userOrder->status = 'PIX';
                $this->userOrder->save();


            } else {
                // Se a requisição não for bem-sucedida, lançar uma exceção com o erro
                $this->userOrder->status = json_decode($response->body())->errors[0]->description;
                $this->userOrder->save();

                throw new \Exception(json_decode($response->body())->errors[0]->description . $response->status());
            }
        } catch (\Exception $e) {
            // Tratar erros de requisição

            response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
