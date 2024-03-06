<?php

namespace App\Jobs;

use App\Models\UserOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class UserOrderCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $userOrder;

    /**
     * Create a new job instance.
     */
    public function __construct(UserOrder $userOrder)
    {
        $this->userOrder = $userOrder;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Obter o token da conta Asaas associada ao cliente
        $token = $this->userOrder->asaasCustomer->asaasAccount->token;

        // Obter os dados do cliente Asaas
        $data = $this->userOrder->toArray();

        try {
            // Fazer uma requisição POST para criar o cliente Asaas
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'access_token' => $token,
            ])->post('https://sandbox.asaas.com/api/v3/payments', $data);

            // Verificar se a requisição foi bem-sucedida (código de status 2xx)
            if ($response->successful()) {
                // Se for bem-sucedida, obter o conteúdo da resposta
                $content = $response->json();

                // Faça algo com a resposta, por exemplo, salvar o ID do cliente criado
                // $asaasCustomerId = $content['id'];

                // $this->asaasCustomer->asaas_customer = $asaasCustomerId;
                // $this->asaasCustomer->save();
                // Retornar a resposta ou fazer qualquer outra coisa necessária
                //dd($content);


                //return $content;
            } else {
                // Se a requisição não for bem-sucedida, lançar uma exceção com o erro
                throw new \Exception('Erro ao criar cliente Asaas: ' . $response->status());
            }
        } catch (\Exception $e) {
            // Tratar erros de requisição
            //dd(response()->json(['error' => $e->getMessage()], 500));
        }
    }
}
