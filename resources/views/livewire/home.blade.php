<div class="bg-base-200 space-y-5">
    <x-hero.main />

    @if ($categories->isNotEmpty())
        <x-categories.main1 :$categories />
    @endif

    <div>
        <div class="divider">⭐ Top Sellers </div>
        <div class="grid grid-cols-1 sm:grid-cols-2  md:grid-cols-2 lg:grid-cols-3  gap-4 p-3 lg:px-16">
            @foreach ($featuredProducts as $product)
                @if ($product->description || $product->variations || $product->getFirstMedia())
                    <x-card.main1 :$product />
                @else
                    <x-card.main2 :$product />
                @endif
            @endforeach
        </div>
        <div class="divider"></div>
    </div>



    @foreach ($categories as $category)
        @if ($category->design == 1 && $category->getFirstMedia())
            <x-category-header.main1 :$category />
        @else
            <x-category-header.main2 :$category />
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2  md:grid-cols-2 lg:grid-cols-3  gap-4 p-3 lg:px-16">
            @foreach ($category->products as $product)
                @if ($product->description || $product->variations || $product->getFirstMedia())
                    <x-card.main1 :$product />
                @else
                    <x-card.main2 :$product />
                @endif
            @endforeach
        </div>

        @if ($category->addons->isNotEmpty())
            <div class="overflow-x-auto p-5 lg:px-16">
                <!-- Addons Section Title -->
                <h4 class="font-bold text-lg mb-2 pb-1">
                    Add-Ons for {{ $category->name }}
                </h4>

                <table class="table table-zebra w-full border border-base-300 rounded-lg overflow-hidden">
                    <thead class="bg-base-200">
                        <tr>
                            <th class="text-left">#</th>
                            <th class="text-left">Add-On Name</th>
                            <th class="text-right">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category->addons as $index => $addon)
                            <tr class="hover:bg-base-100 transition-colors duration-200">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $addon->name }}</td>
                                <td class="text-right">${{ number_format($addon->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endforeach

    <x-footer.main />
    
</div>
