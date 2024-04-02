<div>
    <div class="mt-16">
        @foreach ($categories as $category)

        @if($category->Products->first() !== null)
        <h3 class="text-gray-600 text-2xl font-medium">{{$category->name}}</h3>
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
            @foreach ( $category->Products as $product)
            @if ($product->Price->first())
            @livewire('product-show ', ['product' => $product])
            @endif

            @endforeach
        </div>
        @endif
        @endforeach
    </div>
</div>
