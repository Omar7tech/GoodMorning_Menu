@props(['product'])

<article
    class="card w-full bg-base-100 shadow-lg rounded-xl border border-base-200 hover:shadow-xl transition-all duration-300 overflow-hidden group"
    itemscope itemtype="https://schema.org/Product">

    <div class="flex items-center gap-3 p-3 relative">
        @if ($product->getFirstMediaUrl())
            <figure
                class="relative overflow-hidden {{ $product->featured ? 'ring-yellow-500' :'ring-green-800' }} ring-offset-base-100 rounded-full ring-2 ring-offset-2">
                <img src="{{ $product->getFirstMediaUrl() }}" alt="{{ $product->name }}"
                    class="w-16 h-16 object-cover shadow group-hover:scale-110 transition-transform duration-300"
                    itemprop="image" />
            </figure>
        @endif

        <div class="flex-1 min-w-0">
            <header class="flex justify-between items-start mb-1">
                <h3 class="font-bold text-base truncate flex space-x-1 items-center" itemprop="name">
                    @if ($product->featured)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 text-yellow-500"
                            aria-label="Featured product">
                            <path fill-rule="evenodd"
                                d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                clip-rule="evenodd" />
                        </svg>
                    @endif

                    <span>{{ $product->name }}</span>
                </h3>

                @if ($product->price && !$product->variations)
                    <span class="badge badge-neutral badge-sm font-semibold ml-2" itemprop="offers" itemscope
                        itemtype="https://schema.org/Offer">
                        $<span itemprop="price">{{ $product->price }}</span>
                        <meta itemprop="priceCurrency" content="USD" />
                        <link itemprop="availability" href="https://schema.org/InStock" />
                    </span>
                @endif

            </header>

            <p class="text-xs text-base-content/70 line-clamp-2 mb-2 leading-tight" itemprop="description">
                {{ $product->description }}
            </p>

            @if ($product->variations)
                <div class="flex gap-1 join overflow-auto">
                    @foreach ($product->variations as $variation)
                        <button class="btn btn-xs join-item" >
                            {{ $variation['name'] }} ${{ $variation['price'] }}
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

        <div
            class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-transparent via-base-300 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        </div>
    </div>
</article>
