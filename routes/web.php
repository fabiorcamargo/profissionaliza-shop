<?php

use App\Mail\TestEmail;
use App\Models\User;
use App\Models\UserOrder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');
Route::view('product-show/{id}', 'product-show');
Route::view('checkout', 'checkout');

Route::get('mail', function(){
    //dd('s');
    Mail::to('contato@profissionalizaead.com.br')->send(new TestEmail());
});

Route::get('test', function(){

    $user = User::where('email', 'fabio.xina@gmail.com')->first();
    $order = UserOrder::first();
    
    dd($order->asaasAccount());

});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
