<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
        <a @if($product->Price->first() !== null) href="/ps/{{$product->id}}" @endif >
            <img class="rounded-t-lg" src="/product/{{$product->Image->first() == null ? 'default.webp' : $product->Image->first()->path}}" alt="" />
        </a>
        <div class="p-5">
            <a >
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                    {{$product->name}}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700">{{$product->description}}
            </p>

            <div class="flex">
                <p class="text-2xl font-bold text-green-600">R${{$product->Price->first() == null ? '' : number_format($product->Price->first()->price, 2, ',', '.')}}</p>
                <del class="ml-2 align-super text-base font-bold text-red-800"> R${{$product->Price->first() == null ? '' : number_format($product->Price->first()->price * 1.4286 , 2, ',', '.')}} </del>
              </div>
            
            </p>
            {{-- <a href="#"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a> --}}
        </div>
    </div>
</div>
