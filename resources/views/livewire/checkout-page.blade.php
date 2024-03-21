<div>

    <hr>
    <div>
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
                                <h3 class="my-5 text-2xl font-normal text-center text-gray-700">Para prosseguir acesse a
                                    sua
                                    conta!</h3>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" wire:model='email' name="email" id="email" autocomplete="username"
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

        <div class="sm:flex justify-center bg-gray-50 h-screen pt-10">
            <div class="px-4 pt-4 pb-4 lg:mt-4">
                <div class="relative bg-white rounded-lg shadow p-4">
                    <form wire:submit="setStep(2)">
                        <p class="text-xl font-medium">Dados Pessoais</p>
                        <p class="text-gray-400">Insira as informações abaixo:</p>
                        <div class="flex flex-col sm:flex-row pt-2">
                            <div class="relative w-full">
                                <input type="text" wire:model.live='name' id="name" name="name"
                                    class="w-full px-4 py-3 pl-11 rounded-md border border-gray-200 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Seu Nome" required />
                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                    <x-heroicon-o-user-circle class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>

                        </div>
                        <div class="flex flex-col sm:flex-row pt-2">
                            <div class="relative w-full pt-1 sm:pt-0">
                                <input type="email" wire:model.live='email' wire:blur='emailCheck' id="email"
                                    name="email"
                                    class="w-full px-4 py-3 pl-11 rounded-md border border-gray-200 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="exemplo@email.com" minlength="11" required />
                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                    <x-heroicon-o-envelope class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>

                        </div>

                        @if($this->emailCheck())
                        <span class="text-sm px-1 text-red-600 ">Email já cadastrado, utilize outro ou <button
                                wire:click='setStep(1)' class="text-blue-500 text-lg">faça login.</button></span>
                        @endif
                        <div class="flex flex-col sm:flex-row pt-2">

                            <div class="relative w-full">
                                <div class="relative w-full pt-1 sm:pt-0">
                                    <input type="text" wire:model.live='tel' id="tel" name="tel"
                                        class="input-phone w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
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
                                                autocomplete="username"
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
                                <input x-bind:type="showPassword ? 'text' : 'password'" wire:model.live='password'
                                    id="password" name="password" autocomplete="current-password"
                                    class="w-full px-4 py-3 pl-11 rounded-md border border-gray-200 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Senha" required />
                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                    <x-heroicon-o-lock-closed class="h-5 w-5 text-gray-400" />
                                </div>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
                                    @click="showPassword = !showPassword">
                                    <x-heroicon-o-eye-slash class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>



                        <button type="submit" wire:click='createUser()' @if($this->emailCheck() || empty($name) ||
                            empty($email) || empty($tel) || empty($cpfCnpj) || empty($password)) disabled

                            class="mt-4 w-full text-white bg-blue-200 focus:ring-4 flex items-center justify-center
                            focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                            text-center "
                            @else
                            class="mt-4 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 flex items-center
                            justify-center focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5
                            py-2.5
                            text-center "

                            @endif
                            >Próximo
                            <x-heroicon-o-arrow-right class="w-4 h-4 ml-2 disabled" />
                        </button>


                    </form>
                </div>
            </div>
        </div>



        @elseif ($step == 3)
        @livewire('checkout-pay', ['carts' => $carts])
        @endif

    </div>
    {!! $fb_script !!}
</div>
