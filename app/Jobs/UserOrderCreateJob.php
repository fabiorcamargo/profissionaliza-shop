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

class UserOrderCreateJob implements ShouldQueue
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

        if($userOrder->billingTypes->name == 'CREDIT_CARD')
        {

        $this->data =[
            "billingType"=> $userOrder->billingTypes->name,
            "creditCard"=> [
              "holderName"=> $userOrder->pay['holderName'],
              "number"=> $userOrder->pay['number'],
              "expiryMonth"=> $userOrder->pay['expiryMonth'],
              "expiryYear"=> $userOrder->pay['expiryYear'],
              "ccv"=> $userOrder->pay['ccv']
            ],
            "creditCardHolderInfo"=> [
              "name"=> $userOrder->user->name,
              "email"=> $userOrder->user->email,
              "cpfCnpj"=> $userOrder->user->cpfCnpj,
              "postalCode"=> $userOrder->postalCode,
              "addressNumber"=> $userOrder->addressNumber,
              "addressComplement"=> null,
              "mobilePhone"=> $userOrder->user->phone
        ],
            "customer"=> $userOrder->user->AsaasCustomer->asaas_customer,
            "dueDate"=> $userOrder->dueDate,
            "value"=> $userOrder->value,
            "description"=> $userOrder->description,
            "externalReference"=> "056984"
        ];

    } 
    
    elseif($userOrder->billingTypes->name == 'BOLETO')

    {

        $this->data =[
                "billingType"=> $userOrder->billingTypes->name,
                "customer"=> $userOrder->user->AsaasCustomer->asaas_customer,
                "dueDate"=> $userOrder->dueDate,
                "value"=>  $userOrder->value,
                "installmentCount" => $userOrder->installmentCount,
                "installmentValue" => $userOrder->installmentValue,
                "description"=> $userOrder->description,
                "externalReference"=> "056984",
                "postalService"=> false
        ];
    } 
    
    elseif($userOrder->billingTypes->name == 'PIX')
    {
        $this->data =[
                "billingType"=> $userOrder->billingTypes->name,
                "customer"=> $userOrder->user->AsaasCustomer->asaas_customer,
                "dueDate"=> $userOrder->dueDate,
                "value"=>  $userOrder->value,
                "description"=> $userOrder->description,
                "externalReference"=> "056984",
                "postalService"=> false
        ];
    }

    //dd($this->data);

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
            ])->post('https://sandbox.asaas.com/api/v3/payments', $this->data);

            // Verificar se a requisição foi bem-sucedida (código de status 2xx)
            if ($response->successful()) {
                // Se for bem-sucedida, obter o conteúdo da resposta
                $content = $response->json();

                //dd($content);
                $this->userOrder->payment_id = $content['id'];
                $this->userOrder->status = $content['status'];
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
