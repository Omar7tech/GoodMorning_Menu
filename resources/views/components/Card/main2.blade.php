@props(['product'])
<article
    class="card w-full bg-base-100 shadow-md rounded-xl border border-base-200 hover:shadow-lg transition-all duration-300 overflow-hidden"
    itemscope itemtype="https://schema.org/Product">
    <div class="p-5">
        <h3 class="font-bold text-lg flex items-center justify-between gap-4" itemprop="name">
            <div class="flex items-center gap-2 min-w-0">
                @if ($product->featured)
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="size-5 text-yellow-500 shrink-0" aria-label="Featured product">
                        <path fill-rule="evenodd"
                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.20l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                            clip-rule="evenodd" />
                    </svg>
                @endif
                <span class="truncate">{{ $product->name }}</span>
            </div>

            @if ($product->price)
                <div class="badge badge-lg px-4 py-2 font-bold text-base shrink-0"
                    itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                    $<span itemprop="price">{{ $product->price }}</span>
                    <meta itemprop="priceCurrency" content="USD" />
                    <link itemprop="availability" href="https://schema.org/InStock" />
                </div>
            @endif
        </h3>
    </div>
</article>
