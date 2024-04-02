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

class CheckPay implements ShouldQueue
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

        try {
            // Fazer uma requisição POST para criar o cliente Asaas
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'access_token' => $this->token,
            ])->post('https://sandbox.asaas.com/api/v3/payments/'. $this->userOrder->payment_id);

            // Verificar se a requisição foi bem-sucedida (código de status 2xx)
            if ($response->successful()) {

                
                // Se for bem-sucedida, obter o conteúdo da resposta
                $content = $response->json();

                
                if ($content['status'] == 'RECEIVED'){
                    //dd('s');
                    $this->userOrder->response = $content;
                    $this->userOrder->status = 'RECEIVED';
                    $this->userOrder->save();
                }else{
                    //dd('n');
                }


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
