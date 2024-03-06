<div>
    <div class="flex flex-col items-center border-b bg-white pb-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">


        <div class="{{ $modal ? '' : 'hidden' }} relative z-50" aria-labelledby="modal-title" role="dialog"
            aria-modal="true" wire:click="closeModal">
            <!--
              Background backdrop, show/hide based on modal state.

              Entering: "ease-out duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <!--
                  Modal panel, show/hide based on modal state.

                  Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                  Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                        wire:click.stop>
                        <div class="relative bg-white rounded-lg shadow ">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900 text-center">
                                    Esse email já existe insira sua senha para prosseguir.
                                </h3>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <form wire:submit.prevent="login" class="space-y-4">
                                    <div>
                                        <label for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                                        <input type="email" wire:model='email' name="email" id="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            placeholder="name@company.com" required />
                                    </div>
                                    <div>
                                        <label for="password"
                                            class="block mb-2 text-sm font-medium text-gray-900 ">Senha</label>
                                        <input type="password" wire:model='password' name="password" id="password"
                                            placeholder="Senha"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required />
                                    </div>
                                    <span class="text-sm px-1 text-red-600 {{$login ? '' : 'hidden'}}">Credenciais não
                                        localizadas</span>
                                    <div class="flex justify-between">
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="remember" type="checkbox" value=""
                                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 " />
                                            </div>
                                            <label for="remember"
                                                class="ms-2 text-sm font-medium text-gray-900 ">Lembrar</label>
                                        </div>
                                        <a href="#" class="text-sm text-blue-700 hover:underline ">Recuperar Senha?</a>
                                    </div>


                                    <div class="flex space-x-4 pt-4">
                                        <button type="button" wire:click="fecharModal()"
                                            class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Voltar</button>
                                        <button type="button" wire:click='loginCheck()'
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Prosseguir</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{--
        <!-- Modal toggle -->
        <button wire:click='openModal'
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
            type="button">
            Toggle modal
        </button> --}}




    </div>

    @if($step == 0)

    <div class="sm:flex justify-center bg-gray-50 h-screen">
        <div class="px-4 pt-4 pb-4 lg:mt-4">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <div class="p-4 md:p-5 text-center flex flex-col items-center">
                        <h3 class="my-5 text-2xl font-normal text-gray-500">Para prosseguir acesse a sua conta!</h3>
                        <button type="button" wire:click='setStep(2)'
                            class="py-2.5 px-5 w-60 text-md  font-medium text-white focus:outline-none bg-blue-500 rounded-lg border border-blue-200 hover:bg-blue-700 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-10">
                            Criar Conta
                        </button>
                        <button wire:click='setStep(1)' type="button"
                            class="mt-2 py-2.5 px-5 w-60 text-md font-medium text-blue-500 focus:outline-none bg-white rounded-lg border-gray-200 hover:bg-blue-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-10">
                            Acessar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif($step == 1)

    <div class="sm:flex justify-center bg-gray-50 h-screen">
        <div class="px-4 pt-4 pb-4 lg:mt-4">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <form wire:submit.prevent="login" class="space-y-4">
                        <div class="p-4 md:p-5 flex flex-col">
                            <h3 class="my-5 text-2xl font-normal text-center text-gray-700">Para prosseguir acesse a sua
                                conta!</h3>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" wire:model='email' name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Email" required />

                            <label for="password"
                                class="block mb-2 pt-4 text-sm font-medium text-gray-900">Senha</label>
                            <input type="password" wire:model='password' name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Senha" required />
                            <span class="text-sm px-1 text-red-600 {{$login ? '' : 'hidden'}}">Credenciais não
                                localizadas</span>

                            <div class="p-4 md:p-5 text-center flex flex-col items-center">
                                <button type="button" wire:click='loginCheck()'
                                    class="py-2.5 px-5 w-60 text-md  font-medium text-white focus:outline-none bg-blue-500 rounded-lg border border-blue-200 hover:bg-blue-700 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-10">
                                    Entrar
                                </button>
                                <button wire:click='setStep(0)' type="button"
                                    class="mt-2 py-2.5 px-5 w-60 text-md font-medium text-blue-500 focus:outline-none bg-white rounded-lg border-gray-200 hover:bg-blue-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-10">
                                    Voltar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @elseif($step == 2)

    <div class="sm:flex justify-center bg-gray-50 h-screen">
        <div class="px-4 pt-4 pb-4 lg:mt-4" >
            <div class="relative bg-white rounded-lg shadow p-4">
                <form wire:submit="setStep(2)">
                    <p class="text-xl font-medium">Dados Pessoais</p>
                    <p class="text-gray-400">Insira as informações abaixo:</p>
                    <div class="flex flex-col sm:flex-row pt-2">
                        <div class="relative w-full">
                            <input type="text" wire:model.live='name' id="name" name="name"
                                class="w-full px-4 py-3 pl-11 rounded-md border border-gray-200 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Seu Nome" required />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <x-heroicon-o-user-circle class="h-5 w-5 text-gray-400" />
                            </div>
                        </div>

                    </div>
                    <div class="flex flex-col sm:flex-row pt-2">
                        <div class="relative w-full pt-1 sm:pt-0">
                            <input type="email" wire:model.live='email' wire:blur='emailCheck' id="email" name="email"
                                class="w-full px-4 py-3 pl-11 rounded-md border border-gray-200 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="exemplo@email.com" minlength="11" required />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <x-heroicon-o-envelope class="h-5 w-5 text-gray-400" />
                            </div>
                        </div>

                    </div>

                    @if($this->emailCheck())
                    <span class="text-sm px-1 text-red-600 ">Email já cadastrado, utilize outro ou <button wire:click='setStep(1)' class="text-blue-500 text-lg">faça login.</button></span>
                    @endif
                    <div class="flex flex-col sm:flex-row pt-2">

                        <div class="relative w-full">
                            <div class="relative w-full pt-1 sm:pt-0">
                                <input type="text" wire:model.live='tel' id="tel" name="tel"
                                    class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Celular com DDD" maxlength="11" required />
                                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex mt-3 px-3">
                                    <x-heroicon-o-identification class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>

                        </div>

                        <div class="relative w-full">
                            <div x-data="{ cpfChange: true }">
                                <template x-if="cpfChange">
                                    <div class="relative w-full pt-1 sm:pt-0">
                                        <input type="text" wire:model.live='cpfCnpj' id="cpfCnpj" name="cpfCnpj"
                                            class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                            placeholder="CPF" minlength="11" maxlength="11" required />
                                        <div
                                            class="pointer-events-none absolute inset-y-0 left-0 inline-flex mt-3 px-3">
                                            <x-heroicon-o-identification class="h-5 w-5 text-gray-400" />
                                        </div>
                                        <p class="text-blue-500 text-sm mt-1 cursor-pointer"
                                            x-on:click="cpfChange = !cpfChange">Mudar para CNPJ</p>
                                    </div>
                                </template>
                                <template x-if="!cpfChange">
                                    <div class="relative w-full pt-1 sm:pt-0">
                                        <input type="text" wire:model.live='cpfCnpj' id="cpfCnpj" name="cpfCnpj"
                                            class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                            placeholder="CNPJ" minlength="14" maxlength="14" required />
                                        <div
                                            class="pointer-events-none absolute inset-y-0 left-0 inline-flex mt-3 px-3">
                                            <x-heroicon-o-identification class="h-5 w-5 text-gray-400" />
                                        </div>
                                        <p class="text-blue-500 text-sm mt-1 cursor-pointer"
                                            x-on:click="cpfChange = !cpfChange">Mudar para CPF</p>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>


                    <div x-data="{ showPassword: false }" class="flex flex-col sm:flex-row pt-2">
                        <div class="relative w-full">
                            <input x-bind:type="showPassword ? 'text' : 'password'" wire:model.live='password' id="password" name="password"
                                class="w-full px-4 py-3 pl-11 rounded-md border border-gray-200 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Senha" required />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <x-heroicon-o-lock-closed class="h-5 w-5 text-gray-400" />
                            </div>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
                                @click="showPassword = !showPassword">
                                <x-heroicon-o-eye-slash  class="h-5 w-5 text-gray-400"/>
                            </div>
                        </div>
                    </div>



                    <button type="submit" wire:click='createUser()' @if($this->emailCheck() || empty($name) ||  empty($email) || empty($tel) || empty($cpfCnpj) || empty($password)) disabled

                        class="mt-4 w-full text-white bg-blue-200 focus:ring-4 flex items-center justify-center focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
                        @else
                        class="mt-4 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 flex items-center justify-center focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "

                        @endif
                        >Próximo
                        <x-heroicon-o-arrow-right class="w-4 h-4 ml-2 disabled"  />
                    </button>


                </form>
            </div>
        </div>
    </div>



    @elseif ($step == 3)
    <div class="grid sm:px-10 pt-4 pb-10 lg:grid-cols-2 lg:px-20 xl:px-32">
        <div class="px-4 pt-8">
            <p class="text-xl font-medium">Itens do Carrinho</p>
            <p class="text-gray-400">Verifique seus itens. E selecione a forma de pagamento.</p>
            <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                @isset($carts)
                @foreach ($carts as $key => $value)
                @php
                $product = App\Models\Product::find($key);
                @endphp
                <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                    <img class="m-2 h-24 w-28 rounded-md border object-cover object-center"
                        src="/product/{{$product->Image->first()->path}}" alt="" />
                    <div class="flex w-full flex-col px-4 py-4">
                        <span class="font-semibold">{{$product->name}}</span>
                        <div class="flex items-center my-2">
                            <button wire:click="cartAdd({{ json_encode([$product->id => 1]) }})"
                                class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <x-heroicon-c-plus class="h-5 w-5" />
                            </button>
                            <span class="text-gray-700 mx-2">{{$value}}</span>

                            @if($value == 1)
                            <button wire:click="cartRm({{ json_encode([$product->id => -1]) }})"
                                class="{{ $value == 1 ? " text-red-500" : "text-gray-500" }} focus:outline-none">
                                <x-heroicon-c-trash class="h-5 w-5" />
                            </button>
                            @else
                            <button wire:click="cartRm({{ json_encode([$product->id => -1]) }})"
                                class="{{ $value == 1 ? " text-gray-500" : "text-gray-500" }} focus:outline-none">
                                <x-heroicon-m-minus class="h-5 w-5" />
                            </button>
                            @endif
                        </div>
                        <div class="flex">
                            <p class="text-2xl font-bold text-gray-900">R${{$product->Price->first()->price * $value}}
                            </p>
                            <del class="ml-2 align-super text-1xl font-bold text-gray-500">
                                R${{$product->Price->first()->price * $value}} </del>
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset
            </div>

            <p class="mt-8 text-lg font-medium">Forma de Pagamento</p>
            <p class="text-gray-400">Sem consulta ao SPC/SERASA.</p>
            <form class="mt-5 grid gap-6">
                <div class="relative">
                    <input class="peer hidden" id="radio_1" type="radio" name="radio" checked />
                    <span
                        class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                    <label
                        class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                        for="radio_1">
                        {{-- <img class="w-14 object-contain"
                            src="https://componentland.com/images/naorrAeygcJzX0SyNI4Y0.png" alt="" /> --}}
                        <x-bx-credit-card class="w-14 object-contain text-indigo-600 " />
                        <div class="ml-5">
                            <span class="mt-2 font-semibold">Cartão de Crédito</span>
                            <p class="text-slate-500 text-sm leading-6">Liberação imediata após aprovação</p>
                            <div class="flex flex-wrap items-center">
                                <img class="w-8 object-contain" src="/card/visa.svg" alt="" />
                                <img class="w-8 object-contain" src="/card/mastercard.svg" alt="" />
                                <img class="w-8 object-contain" src="/card/elo.svg" alt="" />
                                <img class="w-8 object-contain" src="/card/hipercard.svg" alt="" />
                                <img class="w-8 object-contain" src="/card/discover.svg" alt="" />
                                <img class="w-8 object-contain" src="/card/jcb.svg" alt="" />
                            </div>
                        </div>
                    </label>
                </div>

                <div class="relative">
                    <input class="peer hidden" id="radio_2" type="radio" name="radio" />
                    <span
                        class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                    <label
                        class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                        for="radio_2">
                        <x-bx-barcode class="w-14 object-contain text-indigo-600" />
                        {{-- <img class="w-14 object-contain"
                            src="https://componentland.com/images/oG8xsl3xsOkwkMsrLGKM4.png" alt="" /> --}}
                        <div class="ml-5">
                            <span class="mt-2 font-semibold">Boleto Bancário</span>
                            <p class="text-slate-500 text-sm leading-6">Liberação após o primeiro pagamento</p>
                        </div>
                    </label>
                </div>
            </form>
        </div>

        <form action="" method="post">
            <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                <p class="text-xl font-medium">Pagamento</p>
                <p class="text-gray-400">Insira as informações de Pagamento.</p>
                <div class="">
                    <label for="email" class="mt-4 mb-2 block text-sm font-medium">CPF do titular do cartão</label>
                    <div class="relative">
                        <input type="text" id="cpfCnpj" name="text" value="{{auth()->user()->cpfCnpj}}"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="999 999 999 99" minlength="11" required />
                        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                            <x-heroicon-o-envelope class="h-5 w-5 text-gray-400" />

                        </div>
                    </div>
                    <label for="holderName" class="mt-4 mb-2 block text-sm font-medium">Nome Impresso</label>
                    <div class="relative">
                        <input type="text" id="holderName" name="holderName"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="NOME IGUAL AO IMPRESSO NO CARTÃO" required />
                        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                            <x-heroicon-o-identification class="h-5 w-5 text-gray-400" />

                        </div>
                    </div>

                    <label for="number" class="mt-4 mb-2 block text-sm font-medium">Dados do Cartão</label>
                    <div class="flex flex-wrap">
                        <div class="relative w-full sm:w-6/12 flex-shrink-0">
                            <input type="text" id="number" name="number"
                                class="w-full rounded-md border border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="xxxx-xxxx-xxxx-xxxx" required />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <x-heroicon-o-credit-card class="h-5 w-5 text-gray-400" />

                            </div>
                        </div>
                        <div class="relative w-full sm:w-6/12 flex justify-between">
                            <input type="text" name="expiryMonth"
                                class="w-1/3 rounded-md border border-gray-200 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="MÊS" maxlength="2" required />
                            <input type="text" name="expiryYear"
                                class="w-1/3 rounded-md border border-gray-200 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="ANO" minlength="4" maxlength="4" required />
                            <input type="text" name="ccv"
                                class="w-1/3 rounded-md border border-gray-200 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="CVC" minlength="3" required />
                        </div>

                    </div>
                    <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Endereço
                        Faturamento</label>

                    <div class="flex flex-col sm:flex-row pt-2">
                        <div class="relative w-full sm:w-6/12 flex justify-between">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <x-heroicon-o-map-pin
                                    class="h-5 w-5 {{$validCep == true ? 'text-gray-400' : 'text-red-400'}}"
                                    aria-hidden="true" />
                            </div>
                            <input type="text" id="postalCode" name="postalCode"
                                class="{{$validCep == true ? 'bg-white border placeholder-gray-700 rounded-md border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500 block w-full ps-10 p-2.5': 'bg-red-50 border border-red-300 text-red-900 text-sm rounded-lg placeholder-red-500 focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5 px-2 py-3 pl-11'}}"
                                placeholder="CEP" wire:model='postalCode' wire:blur='getCep()' minlength="8"
                                maxlength="8" required />
                        </div>
                        <div class="relative w-full sm:w-6/12 flex justify-between">
                            <input type="text" name="uf" id="uf" placeholder="UF" wire:model.live='uf'
                                class="w-1/3 rounded-md border border-gray-200 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                required>
                            </input>
                            <input type="text" name="city" wire:model.live='city'
                                class="w-full rounded-md border border-gray-200 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Cidade" required />
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row">
                        <div class="relative flex-shrink-0 sm:w-6/12">
                            <input type="text" id="address" name="address" wire:model.live='address'
                                class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Rua/Avenida/Travessa/..." required />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <img class="h-4 w-4 object-contain" src="/Flag_of_Brazil.svg" alt="" />
                            </div>
                        </div>
                        <input type="text" name="province" id="province" wire:model.live='province'
                            class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-4/12 focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Bairro" required />
                        <input type="text" name="addressNumber" id="addressNumber"
                            class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Número" required />
                    </div>
                    <!-- Total -->
                    <div class="mt-6 border-t border-b py-2">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Subtotal</p>
                            <p class="font-semibold text-gray-900">$399.00</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Shipping</p>
                            <p class="font-semibold text-gray-900">$8.00</p>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Total</p>
                        <p class="text-2xl font-semibold text-gray-900">$408.00</p>
                    </div>
                    <button class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white"
                        type="send">ENVIAR</button>
                </div>

            </div>
        </form>
    </div>
    @endif
