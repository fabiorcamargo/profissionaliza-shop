<?php

namespace App\Livewire;

use App\Http\Controllers\FBController;
use App\Mail\CadastroConfirmado;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\Livewire;

class CheckoutPage extends Component
{
    public $carts;
    public $cpfChange = true;
    public $step = 0;
    public $name;
    public $email;
    public $tel;
    public $cpfCnpj;
    public $password;
    public $login = false;
    public $fb_script;

    public function emailCheck()
    {
        return User::where('email', $this->email)->exists();
    }

    public function createUser()
    {
        $user = new User();
        $user = $user->create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->tel,
            'cpfCnpj' => $this->cpfCnpj,
            'password' => bcrypt($this->password),
        ]);

        $user->cart()->create([
            'body' => $this->carts
        ]);
        $this->loginCheck();

        $fb = new FBController;
        $fb->CompleteRegistration($user);

        Mail::to('fabiorcamargo@gmail.com')->send(new CadastroConfirmado($user, $this->password));
        
    }


    public function loginCheck()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            $this->step = 3;
            $this->login = false;
            $user = auth()->user();
            Livewire::actingAs($user);
        } else {
            $this->step = 1;
            $this->login = true;
        }

        return redirect('/checkout');
    }

    public function setStep($data)
    {
        $this->step = $data;
    }

    public function mount()
    {
        $carrinhoAtual = session()->get('cart', []);

        $fb = new FBController;
        $fb->InitiateCheckout();

        if (Auth::check()) {
            $user = auth()->user();
            //dd($user);
                if ($user->cart == null) {
                    $user->cart()->create(['body' => $carrinhoAtual]);
                    $this->carts = $carrinhoAtual;
                    $this->step = 3;
                } else {

                    $user->cart->body = $carrinhoAtual;
                    $user->cart->save();
                    $this->carts = $carrinhoAtual;
                    $this->step = 3;
                }
        } else {
            $this->carts = $carrinhoAtual;
            $this->step = 0;
        }

        //dd($this->carts);
    }

    public function render()
    {
        return view('livewire.checkout-page');
    }
}
