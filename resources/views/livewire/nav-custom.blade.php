<div>
    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="w-full text-gray-700 text-2xl font-semibold">
                    Brand
                </div>
                <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center">
                    <div class="flex flex-col sm:flex-row">
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="/">Início</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Contato</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Sobre</a>
                        @if (auth()->user())
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-4 sm:mt-0" href="/client">Conta</a>
                        @else
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-4 sm:mt-0" href="/client">Login</a>
                        @endif

                    </div>
                </nav>


                <div class="flex items-center justify-end w-full">
                    <button @click="cartOpen = !cartOpen" type="button"
                        class="relative inline-flex items-center p-1 mx-4 text-sm font-medium text-center text-gray-500 transition hover:translate-y-2">
                        <x-heroicon-s-shopping-bag class="w-7 h-7" />
                        @if($sum_cart == 0 )
                        @else
                        <span class="relative">
                            <span
                                class="animate-ping absolute top-0 right-0 -mt-1 -mr-1 inline-flex h-4 w-4 rounded-full bg-red-300 opacity-80"></span>
                            <span
                                class="absolute top-0 right-0 -mt-1 -mr-1 bg-red-500 text-white rounded-full w-4 h-4 flex items-center justify-center">
                                <span class="relative z-10">{{$sum_cart}}</span>
                            </span>
                        </span>
                        @endif
                    </button>

                    <div class="flex sm:hidden">
                        <button @click="isOpen = !isOpen" type="button"
                            class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500"
                            aria-label="toggle menu">
                            <x-heroicon-m-bars-3-bottom-right class="h-6 w-6 fill-current" />
                        </button>
                    </div>
                </div>
            </div>

            {{-- <div class="relative mt-6 max-w-lg mx-auto">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>

                <input
                    class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                    type="text" placeholder="Search">
            </div> --}}

            
            @if(request()->path() !== 'checkout')
            @livewire('cart')
            @endif
        </div>
    </div>
