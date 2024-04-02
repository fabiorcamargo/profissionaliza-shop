<div>
    @if ($this->statusPay === 'init')
    <div class="grid sm:px-10 pt-4 pb-10 lg:grid-cols-2 lg:px-20 xl:px-32" wire:loading.remove
        wire:target="checkoutEnd">
        <div class="px-4 pt-8">
            <p class="text-xl font-medium">Itens do Carrinho</p>
            <p class="text-gray-400">Verifique seus itens. E selecione a forma de pagamento.</p>
            <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                @isset($carts)
                @foreach ($carts as $key => $value)
                @php
                $product = App\Models\Product::find($key);
                @endphp
                <div class="flex rounded-lg bg-white flex-row">
                    <img class="m-2 h-24 w-28 rounded-md border object-cover object-center"
                        src="/product/{{$product->Image->first() == null ? 'default.webp' : $product->Image->first()->path}}"
                        alt="" />
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
                            <p class="text-2xl font-bold text-gray-900">
                                R${{number_format($product->Price->first()->price * $value, 2, ',', '.')}}
                            </p>
                            <del class="ml-2 align-super text-1xl font-bold text-gray-500">
                                R${{number_format($product->Price->first()->price * $value, 2, ',', '.') }} </del>
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset
            </div>

            <p class="mt-8 text-lg font-medium">Forma de Pagamento</p>
            <p class="text-gray-400">Sem consulta ao SPC/SERASA.</p>
            <form class="mt-5 grid gap-6" wire:click='setBillingType'>
                

                <div class="relative">
                    <input class="peer hidden" id="radio_2" type="radio" name="radio" value='1'
                        wire:model='billingType' />
                    <span
                        class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                    <label
                        class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                        for="radio_2">
                        <x-gmdi-pix class="w-14 object-contain text-indigo-600" />
                        {{-- <img class="w-14 object-contain"
                            src="https://componentland.com/images/oG8xsl3xsOkwkMsrLGKM4.png" alt="" /> --}}
                        <div class="ml-5">
                            <span class="mt-2 font-semibold">Pagamento via PIX</span>
                            <p class="text-slate-500 text-sm leading-6">Liberação imediata após aprovação</p>
                        </div>
                    </label>
                </div>

                <div class="relative">
                    <input class="peer hidden" id="radio_1" type="radio" name="radio" value='2' wire:model='billingType'
                        checked />
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
            </form>
        </div>
        <div>
            @if($billingType == 2)
            <form wire:submit.prevent="checkoutEnd">
                <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                    <p class="text-xl font-medium">Pagamento via Cartão de Crédito</p>
                    <p class="text-gray-400">Insira as informações de Pagamento.</p>
                    <div class="">
                        <label for="email" class="mt-4 mb-2 block text-sm font-medium">CPF do titular do cartão</label>
                        <div class="relative">
                            @php $this->cpfCnpj = auth()->user()->cpfCnpj; @endphp
                            <input type="text" id="cpfCnpj" name="text" wire:model='cpfCnpj'
                                class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="CPF ou CNPJ" minlength="11" maxlength="14" required />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <x-heroicon-o-envelope class="h-5 w-5 text-gray-400" />

                            </div>
                        </div>

                        <label for="holderName" class="mt-4 mb-2 block text-sm font-medium">Nome Impresso</label>
                        <div class="relative">
                            <input type="text" id="holderName" name="holderName" wire:model.live='creditCard.holderName'
                                class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="NOME IGUAL AO IMPRESSO NO CARTÃO" required />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <x-heroicon-o-identification class="h-5 w-5 text-gray-400" />
                            </div>
                        </div>

                        <label for="number" class="mt-4 mb-2 block text-sm font-medium">Dados do Cartão</label>
                        <div class="flex flex-wrap">
                            <div class="relative w-full sm:w-6/12 flex-shrink-0">
                                <input type="text" id="number" name="number" wire:model.live='creditCard.number'
                                    class="w-full rounded-md border border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="xxxx-xxxx-xxxx-xxxx" maxlength="16" required />
                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                    <x-heroicon-o-credit-card class="h-5 w-5 text-gray-400" />

                                </div>
                            </div>
                            <div class="relative w-full sm:w-6/12 flex justify-between">
                                <input type="text" name="expiryMonth" wire:model.live='creditCard.expiryMonth'
                                    class="w-1/3 rounded-md border border-gray-200 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="MÊS" maxlength="2" required />
                                <input type="text" name="expiryYear" wire:model.live='creditCard.expiryYear'
                                    class="w-1/3 rounded-md border border-gray-200 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="ANO" minlength="4" maxlength="4" required />
                                <input type="text" name="ccv" wire:model.live='creditCard.ccv'
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
                                    placeholder="CEP" wire:model='creditCardHolderInfo.postalCode' wire:blur='getCep()'
                                    minlength="8" maxlength="8" required wire:loading.attr="disabled"
                                    wire:target="getCep" />
                            </div>
                            <div class="relative w-full sm:w-6/12 flex justify-between">
                                <input type="text" name="uf" id="uf" placeholder="UF"
                                    wire:model.live='creditCardHolderInfo.uf'
                                    class="w-1/3 rounded-md border border-gray-200 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    required wire:loading.attr="disabled" wire:target="getCep">
                                </input>
                                <input type="text" name="city" wire:model.live='creditCardHolderInfo.city'
                                    class="w-full rounded-md border border-gray-200 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Cidade" required wire:loading.attr="disabled" wire:target="getCep" />
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row">
                            <div class="relative flex-shrink-0 sm:w-6/12">
                                <input type="text" id="address" name="address"
                                    wire:model.live='creditCardHolderInfo.address'
                                    class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Rua/Avenida/Travessa/..." required wire:loading.attr="disabled"
                                    wire:target="getCep" />
                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                    <img class="h-4 w-4 object-contain" src="/Flag_of_Brazil.svg" alt="" />
                                </div>
                            </div>
                            <input type="text" name="province" id="province"
                                wire:model.live='creditCardHolderInfo.province'
                                class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-4/12 focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Bairro" required wire:loading.attr="disabled" wire:target="getCep" />
                            <input type="text" name="addressNumber" id="addressNumber"
                                wire:model='creditCardHolderInfo.addressNumber'
                                class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Número" required />
                        </div>
                        <!-- Total -->
                        <div class="mt-6 border-t border-b py-2">
                            @isset($carts)
                            @foreach ($carts as $key => $value)
                            @php
                            $product = App\Models\Product::find($key);
                            @endphp
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">{{$product->name}} <span
                                        class="text-gray-400 mx-2">{{$value}} un</span> </p>
                                <p class="font-semibold text-gray-900">R${{number_format($product->Price->first()->price
                                    * $value, 2, ',', '.')}}</p>
                            </div>
                            @php $this->total = $product->Price->first()->price * $value @endphp
                            @endforeach
                            @endisset
                        </div>
                        <div class="mt-6 flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Total</p>
                            <p class="text-2xl font-semibold text-gray-900">R$ {{number_format($this->totalPrice(), 2,
                                ',', '.') }}</p>
                        </div>
                        <button class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white"
                            type="send">ENVIAR</button>


                    </div>

                </div>
            </form>
@elseif($billingType ==1)
            <form wire:submit.prevent="checkoutEnd">
                <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                    <p class="text-xl font-medium">Pagamento via PIX</p>
                    <p class="text-gray-400">Insira as informações de Faturamento.</p>
                    <div class="">
                        
                      
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
                                    placeholder="CEP" wire:model='creditCardHolderInfo.postalCode' wire:blur='getCep()'
                                    minlength="8" maxlength="8" required wire:loading.attr="disabled"
                                    wire:target="getCep" />
                            </div>
                            <div class="relative w-full sm:w-6/12 flex justify-between">
                                <input type="text" name="uf" id="uf" placeholder="UF"
                                    wire:model.live='creditCardHolderInfo.uf'
                                    class="w-1/3 rounded-md border border-gray-200 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    required wire:loading.attr="disabled" wire:target="getCep">
                                </input>
                                <input type="text" name="city" wire:model.live='creditCardHolderInfo.city'
                                    class="w-full rounded-md border border-gray-200 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Cidade" required wire:loading.attr="disabled" wire:target="getCep" />
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row">
                            <div class="relative flex-shrink-0 sm:w-6/12">
                                <input type="text" id="address" name="address"
                                    wire:model.live='creditCardHolderInfo.address'
                                    class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Rua/Avenida/Travessa/..." required wire:loading.attr="disabled"
                                    wire:target="getCep" />
                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                    <img class="h-4 w-4 object-contain" src="/Flag_of_Brazil.svg" alt="" />
                                </div>
                            </div>
                            <input type="text" name="province" id="province"
                                wire:model.live='creditCardHolderInfo.province'
                                class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-4/12 focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Bairro" required wire:loading.attr="disabled" wire:target="getCep" />
                            <input type="text" name="addressNumber" id="addressNumber"
                                wire:model='creditCardHolderInfo.addressNumber'
                                class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Número" required />
                        </div>
                        <!-- Total -->
                        <div class="mt-6 border-t border-b py-2">
                            @isset($carts)
                            @foreach ($carts as $key => $value)
                            @php
                            $product = App\Models\Product::find($key);
                            @endphp
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">{{$product->name}} <span
                                        class="text-gray-400 mx-2">{{$value}} un</span> </p>
                                <p class="font-semibold text-gray-900">R${{number_format($product->Price->first()->price
                                    * $value, 2, ',', '.')}}</p>
                            </div>
                            @php $this->total = $product->Price->first()->price * $value @endphp
                            @endforeach
                            @endisset
                        </div>
                        <div class="mt-6 flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Total</p>
                            <p class="text-2xl font-semibold text-gray-900">R$ {{number_format($this->totalPrice(), 2,
                                ',', '.') }}</p>
                        </div>
                        <button class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white"
                            type="send">ENVIAR</button>


                    </div>

                </div>
            </form>

            @endif
        </div>
        {{-- wire:loading wire:target="checkoutEnd" --}}
    </div>
    @endif


    

        <div wire:loading wire:target="checkoutEnd">
            @livewire('pay.pay-load')
        </div>


            @if ($this->statusPay == 1)

                <div wire:poll.5s="getOrder">
                    @livewire('pay.pay-load')
                </div>

                @elseif ($this->statusPay == 'QRCODE')

                <div wire:poll.5s="checkPay">
                    @livewire('pay.pay-pixqr', ['order' => $order])
                </div>

                @elseif ($this->statusPay == 2)

                    @livewire('pay.pay-approve', ['order' => $order])

                @elseif ($this->statusPay == 3)

                    @livewire('pay.pay-recused', ['order' => $order])

            @endif


            <script>
            function copiarParaClipboard() {
                // Seleciona o input com o texto a ser copiado
                var inputTexto = document.getElementById("texto-a-copiar");
            
                // Salva o estado atual do input
                var readOnly = inputTexto.readOnly;
                var disabled = inputTexto.disabled;
            
                // Ativa temporariamente o input para permitir a cópia
                inputTexto.readOnly = false;
                inputTexto.disabled = false;
            
                // Seleciona o conteúdo do input
                inputTexto.select();
            
                // Tenta copiar o texto selecionado
                var sucesso = document.execCommand('copy');
            
                // Restaura o estado original do input
                inputTexto.readOnly = readOnly;
                inputTexto.disabled = disabled;
            
                // Exibe uma mensagem de feedback
                if (sucesso) {
                    // Mostra o sucesso
                    document.getElementById('default-message').style.display = 'none';
                    document.getElementById('success-message').style.display = 'inline-flex';
                    setTimeout(function() {
                        // Retorna ao estado padrão após 2 segundos
                        document.getElementById('default-message').style.display = 'inline-flex';
                        document.getElementById('success-message').style.display = 'none';
                    }, 2000);
                } else {
                    // Exibe uma mensagem de falha
                    alert("Falha ao copiar texto. Por favor, tente manualmente.");
                }
            }
        </script>
                
</div>
