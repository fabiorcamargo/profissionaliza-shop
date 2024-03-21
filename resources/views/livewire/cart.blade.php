<div>
    <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" id="cart"
        class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300 z-50">
        <div class="flex items-center justify-between">
            <h3 class="text-2xl font-medium text-gray-700">Seu Carrinho</h3>
            <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        @isset($carts)

        <hr class="my-3">

        @foreach ($carts as $key => $value)

        @php
            $product = App\Models\Product::find($key);
        @endphp


        <div class="flex justify-between mt-6">
            <div class="flex">
                <img class="h-20 w-20 object-cover rounded" src="/product/{{(!$product->Image()->exists()) ? 'default.webp' : $product->Image->first()->path}}"
                    alt="">
                <div class="mx-3">
                    <h3 class="text-sm text-gray-600">{{$product->name}}</h3>
                    <div class="flex items-center mt-2">
                        <button wire:click="cartAdd({{ json_encode([$product->id => 1]) }})"
                            class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <x-heroicon-c-plus class="h-5 w-5" />
                        </button>
                        <span class="text-gray-700 mx-2">{{$value}}</span>

                        @if($value == 1)
                        <button wire:click="cartRm({{ json_encode([$product->id => -1]) }})"
                            class="{{ $value == 1 ? "text-red-500" : "text-gray-500"}} focus:outline-none">
                            <x-heroicon-c-trash class="h-5 w-5" />
                        </button>
                        @else
                        <button wire:click="cartRm({{ json_encode([$product->id => -1]) }})"
                            class="{{ $value == 1 ? "text-gray-500" : "text-gray-500"}} focus:outline-none">
                            <x-heroicon-m-minus class="h-5 w-5" />
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            <span class="text-gray-600">R${{$product->Price->first()->price * $value}}</span>
        </div>
        @endforeach

        <div class="mt-8">
            <form class="flex items-center justify-center">
                <input class="form-input w-48" type="text" placeholder="Add promocode">
                <button
                    class="ml-3 flex items-center px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    <span>Apply</span>
                </button>
            </form>
        </div>
        <a href="/checkout"
            class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
            <span>Chechout</span>
            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
        @endisset
    </div>
</div>
