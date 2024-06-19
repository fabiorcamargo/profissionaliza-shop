<?php

use App\Jobs\SendMsg;
use App\Jobs\UserOrderCreateJob;
use App\Mail\CadastroConfirmado;
use App\Mail\TestEmail;
use App\Models\BillingType;
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
Route::view('ps/{id}', 'product-show');
Route::view('checkout', 'checkout');

Route::get('mail', function () {

    $user = User::find(2);

    $order = $user->orders()->where('status', 'confirmed')->latest()->first();

    //$user = $order->user;

    //dd($order->payment_id);
    $dueDate = date('d-m-Y', strtotime($order->dueDate));

    //dd($dueDate);

    return view('emails.pagamento-sucesso', ['user' => $user, 'order' => $order]);
    //Mail::to('fabiorcamargo@gmail.com')->send(new CadastroConfirmado());
});

Route::get('test', function () {
    $user = User::where('email', 'fabio.xina@gmail.com')->first();
    $order = UserOrder::find(1);
    dispatch(new UserOrderCreateJob($order));
});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



Route::get('msg', function () {
    $content = 'tyeste';
    dispatch(new SendMsg(env('WPP_PHONE_ADM'), 'Excluído Cliente' . $content));
});

Route::get('{name}', function ($name) {

    return view('construct');

});


require __DIR__ . '/auth.php';
