<?php

namespace App\Jobs;

use App\Models\AsaasCustomer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class AsaasDeletedCustomerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $asaasCustomer;

    /**
     * Create a new job instance.
     */
    public function __construct(AsaasCustomer $asaasCustomer)
    {
        $this->asaasCustomer = $asaasCustomer;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         // Obter o token da conta Asaas associada ao cliente
         $token = $this->asaasCustomer->asaasAccount->token;

         if(env('ASAAS_TYPE') == 'DEV'){
            $url = 'https://sandbox.asaas.com/api/v3/';
         }else if(env('ASAAS_TYPE') == 'PROD'){
            $url = 'https://api.asaas.com/v3/';
         }

         try {
             // Fazer uma requisição POST para criar o cliente Asaas
             $response = Http::withHeaders([
                 'Content-Type' => 'application/json',
                 'access_token' => $token,
             ])->delete($url . 'customers/' . $this->asaasCustomer->asaas_customer);

             // Verificar se a requisição foi bem-sucedida (código de status 2xx)
             if ($response->successful()) {
                 // Se for bem-sucedida, obter o conteúdo da resposta
                 $content = $response->json();

                 //dd($content);

                 // Faça algo com a resposta, por exemplo, salvar o ID do cliente criado
                 //$asaasCustomerId = $content['id'];

                 //$this->asaasCustomer->asaas_customer = $asaasCustomerId;
                 //$this->asaasCustomer->save();
                 // Retornar a resposta ou fazer qualquer outra coisa necessária
                 //dd($content);

                 dispatch(new SendMsg(env('WPP_PHONE_ADM'), 'Excluído Cliente' . $content));
                 //return $content;
             } else {
                 // Se a requisição não for bem-sucedida, lançar uma exceção com o erro

                 dispatch(new SendMsg(env('WPP_PHONE_ADM'), 'Falha: Excluir Cliente' . $response->status()));
                 throw new \Exception('Erro ao criar cliente Asaas: ' . $response->status());
             }
         } catch (\Exception $e) {

            //dd($e);
             // Tratar erros de requisição
             //dd(response()->json(['error' => $e->getMessage()], 500));
         }
     }
}
