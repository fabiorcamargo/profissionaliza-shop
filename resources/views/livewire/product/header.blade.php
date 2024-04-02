<div>
    <div class="w-screen bg-white">
        <div class="relative mx-auto flex flex-col ps-4 md:pb-20 md:flex-row pt-10">
            <!-- Left Column -->
            <div class="mx-auto w-full md:p-10 p-4 max-w-xl lg:max-w-screen-xl">
                <div class="mb-16 lg:mb-0 lg:max-w-lg mx-auto">
                    <div class="max-w-xl">
                        <div>
                            <p
                                class="bg-teal-accent-400 mb-2 inline-block rounded-full py-px text-xs font-semibold uppercase tracking-wider text-indigo-900">
                                Approved by customers</p>
                        </div>

                        <h2
                            class="mb-6 max-w-lg text-3xl font-bold tracking-tight text-slate-700 sm:text-5xl sm:leading-snug">
                            {{$product->name}} <br />
                        </h2>
                        <p class="text-base text-gray-700 md:text-lg">{{$product->description}}</p>

                        <div class="py-8">
                            <div class="flex">
                              <p class="text-3xl font-bold text-green-600">R${{number_format($product->Price->first()->price, 2, ',', '.')}}</p>
                              <del class="ml-2 align-super text-base font-bold text-red-800"> R${{number_format($product->Price->first()->price * 1.4286 , 2, ',', '.')}} </del>
                            </div>

                            <div class="mt-3 flex items-center text-sm font-medium text-gray-600">
                              <x-heroicon-s-tag class="mr-2 block h-4 w-4 align-middle text-gray-500"/>
                              Economize 30% agora
                            </div>
                          </div>
                    </div>
                    <div class="flex items-center">
                        <button wire:click='checkout'
                            class="mr-6 inline-flex h-12 items-center justify-center rounded bg-orange-600 px-6 font-medium tracking-wide text-white shadow-md outline-none transition duration-200 hover:bg-orange-400 focus:ring">
                            Comprar </button>
                        <button wire:click='cartAdd'
                            class="mr-6 inline-flex h-12 items-center justify-center rounded bg-orange-200 px-6 font-medium tracking-wide text-orange-600 shadow-md outline-none transition duration-200 hover:bg-orange-400 focus:ring">
                            Adicionar ao Carrinho </button>
                    </div>
                    <div class="space-y-3 pt-8">
                        <ul class="flex flex-col sm:flex-row gap-4">
                            <li class="flex items-center">
                                <span class="mr-1.5 rounded bg-gray-900 px-2 text-sm font-semibold text-white"> 4.9
                                </span>
                                <div class="flex items-center justify-center">
                                    <x-heroicon-s-star class="h-5 w-5 text-orange-600"/>
                                    <x-heroicon-s-star class="h-5 w-5 text-orange-600"/>
                                    <x-heroicon-s-star class="h-5 w-5 text-orange-600"/>
                                    <x-heroicon-s-star class="h-5 w-5 text-orange-600"/>
                                    <x-heroicon-s-star class="h-5 w-5 text-gray-500"/>

                                </div>
                            </li>
                            <li class="flex">
                                <x-heroicon-m-user-group class="mr-2 w-6 text-gray-500"/>

                                245 Este mês
                            </li>
                        </ul>
                        <ul class="sm:flex items-center text-sm text-gray-500">
                            <li>Criado por <a href="#" class="font-bold"> Rodrigo Lemes </a></li>
                            <span class="hidden sm:inline mx-3 text-2xl">·</span>
                            <li>Última Atualização 01/2024</li>
                        </ul>
                        <ul class="mt-2 space-y-4">
                            <li class="text-left">
                                <label for="accordion-1"
                                    class="relative flex flex-col rounded-md border border-gray-100 shadow-md">
                                    <input class="peer hidden" type="checkbox" id="accordion-1" />
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="absolute right-0 top-4 ml-auto mr-5 h-4 text-gray-500 transition peer-checked:rotate-180"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                    <div class="relative ml-4 cursor-pointer select-none items-center py-4 pr-2">
                                        <h3 class="text-base font-bold text-gray-600 lg:text-base">O que vou
                                            aprender?</h3>
                                    </div>
                                    <div
                                        class="max-h-0 overflow-hidden transition-all duration-500 peer-checked:max-h-full">
                                        <ul class="space-y-1 font-semibold text-gray-600 mb-6">
                                            <!-- Add stuff here -->
                                            @foreach ( $product->Items()->where('product_item_type_id', 1)->get(); as $item)
                                            <li class="flex px-2 sm:px-6 py-2.5 hover:bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="mr-2 w-6">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                {{$item->description}}
                                                {{-- <span class="ml-auto text-sm"> 23 min </span> --}}
                                            </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </label>
                            </li>
                            <li class="text-left">
                                <label for="accordion-2"
                                    class="relative flex flex-col rounded-md border border-gray-100 shadow-md">
                                    <input class="peer hidden" type="checkbox" id="accordion-2" />
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="absolute right-0 top-4 ml-auto mr-5 h-4 text-gray-500 transition peer-checked:rotate-180"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                    <div class="relative ml-4 cursor-pointer select-none items-center py-4 pr-2">
                                        <h3 class="text-base font-bold text-gray-600 lg:text-base">Complementos</h3>
                                    </div>
                                    <div
                                        class="max-h-0 overflow-hidden transition-all duration-500 peer-checked:max-h-full">
                                        <ul class="space-y-1 font-semibold text-gray-600 mb-6">
                                            <!-- Add stuff here -->
                                            @foreach ( $product->Items()->where('product_item_type_id', 2)->get(); as $item)
                                            <li class="flex px-2 sm:px-6 py-2.5 hover:bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="mr-2 w-6">
                                                    {{ svg($item->icon == null ? 'heroicon-o-paper-airplane' : $item->icon) }}
                                                </svg>
                                                {{$item->description}}
                                                {{-- <span class="ml-auto text-sm"> 23 min </span> --}}
                                            </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Left Column -->
            <!-- Right Column -->

            <div class="flex h-full w-full justify-end">
                <div class="my-auto flex-col lg:flex">
                    <img src="/product/{{$product->Image->first() == null ? 'default.webp' : $product->Image->first()->path}}" alt="" />
                </div>
            </div>
            <!-- /Right Column -->
        </div>
    </div>
    @if($script)
        <script>{!! $script !!}</script>
    @endif
</div>
