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



                        <div>
                            <div wire:loading.remove wire:target="createUser">
                                <button type="submit" wire:click='createUser' @if($this->emailCheck() || empty($name)
                                    || empty($email) || empty($tel) || empty($cpfCnpj) || empty($password))

                                    disabled

                                    class="mt-4 w-full text-white bg-blue-200 focus:ring-4 flex items-center
                                    justify-center
                                    focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                                    text-center "
                                    @else
                                    class="mt-4 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 flex
                                    items-center
                                    justify-center focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm
                                    px-5
                                    py-2.5
                                    text-center "

                                    @endif
                                    >Próximo
                                    <x-heroicon-o-arrow-right class="w-4 h-4 ml-2 disabled" />
                                </button>
                            </div>

                            <div wire:loading wire:target="createUser">
                                <button disabled type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                                    <svg aria-hidden="true" role="status"
                                        class="inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="#E5E7EB" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentColor" />
                                    </svg>
                                    Criando...
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>



        @elseif ($step == 3)
        @livewire('checkout-pay', ['carts' => $carts])
        @endif

    </div>
    <script>
        {!! $fb_script !!}
    </script>
</div>