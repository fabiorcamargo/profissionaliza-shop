<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FBController extends Controller
{
    protected $token;
    protected $fbId;
    protected $data;
    protected $eventId;
    protected $user_data;
    protected $time;

    public function __construct()
    {
        $this->token = env('FB_TOKEN');
        $this->fbId = env('FB_ID');
        $this->eventId = (string)Str::uuid();
    }


    public function fbScript(){
        $event = (string)json_decode($this->data)->data[0]->event_name;

        //dd($custom_data);

        //dd(json_encode(json_decode($this->data)->data[0]));
        $script = "fbq('track', '".$event."',". json_encode(json_decode($this->data)->data[0]) .", {'eventID': '".$this->eventId."'})";


        $request = new Request;
        //dd($_COOKIE['_fbp']);

        return str_replace('event_name', 'event', $script);
    }

    public function send()
    {
        try {
            $response = Http::withToken($this->token)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post("https://graph.facebook.com/v12.0/{$this->fbId}/events", json_decode($this->data));
            if ($response->successful()) {
                $content = $response->json();

                return $content;
            } else {
                $error_message = isset($response->json()['error']['message']) ? $response->json()['error']['message'] : 'Erro desconhecido';
                throw new \Exception($error_message . ' (' . $response->status() . ')');
            }
        } catch (\Exception $e) {
            //dd($e->getMessage());
        }
    }



    public function addCart($data)
    {
       $this->seAuth(auth()->user());
        foreach ($data as $key => $value) {
            $product = Product::find($key);
        }

        $this->data = '{
            "data": [
              {
                "event_name": "AddToCart",
                "event_time": ' . time() . ',
                "action_source": "website",
                "event_id":  "' . Str::uuid() . '",
                ' . $this->user_data . '
                "custom_data": {
                    "currency": "BRA",
                    "value": "'.$product->Price->first()->price.'",
                    "content_ids": "'.$product->id.'",
                    "content_name": "'.$product->name.'",
                    "content_type": "product"
                }
              }
              ] ' . (env('FB_API_TEST') == true ? ',"test_event_code": "'. env('FB_TESTCODE') . '"' : '') . '
          }';

          
          

        //dd($this->data);

        $this->send();
        return $this->fbScript();
    }

    public function InitiateCheckout()
    {
       $this->seAuth(auth()->user());
        $this->data = '{
            "data": [
              {
                ' . $this->user_data . '
                "event_name": "InitiateCheckout",
                "event_time": ' . time() . ',
                "action_source": "website",
                "event_id":  "' . Str::uuid() . '"

              }
              ] ' . (env('FB_API_TEST') == true ? ',"test_event_code": "'. env('FB_TESTCODE') . '"' : '') . '
          }';

          //dd($this->data);

        $this->send();

        return $this->fbScript();
    }

    public function Purchase($data)
    {
        $this->seAuth(auth()->user());
        $this->data = '{
            "data": [
              {
                ' . $this->user_data . '
                "event_name": "Purchase",
                "event_time": ' . time() . ',
                "action_source": "website",
                "event_id":  "' . Str::uuid() . '",
                "custom_data": {
                    "currency": "BRL",
                    "value": "'.$data->value.'"
                }
              }
              ] ' . (env('FB_API_TEST') == true ? ',"test_event_code": "'. env('FB_TESTCODE') . '"' : '') . '
          }';

        $this->send();
        return $this->fbScript();
    }


    public function ViewContent(Product $product)
    {
        $this->seAuth(auth()->user());
        
        //dd($fbc);
        //dd($this->user_data);
        $this->data = '{
            "data": [
              {
                "event_name": "ViewContent",
                "event_time": ' . $this->time . ',
                "action_source": "website",
                "event_id":  "' . $this->eventId . '",
                ' . $this->user_data . '
                "custom_data": {
                    "currency": "BRA",
                    "value": "'.$product->Price->first()->price.'",
                    "content_ids": "'.$product->id.'",
                    "content_name": "'.$product->name.'",
                    "content_type": "product"
                }
              }
            ] ' . (env('FB_API_TEST') == true ? ',"test_event_code": "'. env('FB_TESTCODE') . '"' : '') . '
          }';

          

        $this->send();
        return $this->fbScript();
    }

    public function CompleteRegistration(User $user)
    {
       $this->seAuth($user);
        $this->data = '{
            "data": [
              {
                ' . $this->user_data . '
                "event_name": "CompleteRegistration",
                "event_time": ' . time() . ',
                "action_source": "website",
                "event_id":  "' . Str::uuid() . '"
              }
              ] ' . (env('FB_API_TEST') == true ? ',"test_event_code": "'. env('FB_TESTCODE') . '"' : '') . '
          }';
        $this->send();
        return $this->fbScript();
    }

    public function seAuth($user)
    {
        $this->eventId = Str::uuid();
        $this->time = time();
        $this->user = $user;

        $request = Request::capture();
        
        if($request->cookie('_fbc') !== null){
          $fbc = $request->cookie('_fbc');
        }else if($request->input('fbclid') !== null){
          $fbclid = $request->input('fbclid');
          $fbc = "fb.2.$this->time.$fbclid";
        }else{
          $fbc='';
        }

        $userData = [
            'client_ip_address' => request()->ip(),
            'client_user_agent' => request()->header('User-Agent')
        ];

        if ($user != null) {
            $userData['em'] = [hash('sha256', $user->email)];
            $userData['ph'] = [hash('sha256', $user->phone)];
        }

        // Adiciona _fbp se estiver disponível
        if (isset($_COOKIE['_fbp'])) {
            $userData['fbp'] = $_COOKIE['_fbp'];
            $userData['fbc'] = $fbc;

        }

        $this->user_data = '"user_data": ' . json_encode($userData) . ',';
    }
}
