<div class="bg-base-200 space-y-5">
    <x-nav.main />
    <div
        class="absolute top-0 z-[0] mt-16 h-screen w-screen
    bg-[radial-gradient(100%_50%_at_50%_0%,rgba(255,255,0,0.08)_0,rgba(255,255,0,0)_70%,rgba(255,255,0,0)_100%)]">
    </div>
    <x-hero.main />

    @if ($categories->isNotEmpty())
        <x-categories.main1 :$categories />
    @endif

    @if ($settings->new_show)
        <div>
            <div class="divider poppins-bold text-xl divider-danger">
                <img src="{{ asset('icons/new-cat.png') }}" alt="new" class="w-7">
                <span class="text-xl">New Items</span>
            </div>
            <div
                class="w-full bg-[linear-gradient(to_right,#4f4f4f2e_1px,transparent_1px),linear-gradient(to_bottom,#4F4F4F00_1px,transparent_1px)] bg-[size:6rem_4rem]">
                <div>
                    <div class="grid grid-cols-1 sm:grid-cols-2  md:grid-cols-2 lg:grid-cols-3  gap-4 p-3 lg:px-16">
                        @foreach ($newProducts as $product)
                            @if ($product->description || $product->variations || $product->getFirstMedia())
                                <x-card.main1 :$product />
                            @else
                                <x-card.main2 :$product />
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if ($settings->featured_show)
        <div>
            <div class="divider poppins-bold text-xl divider-warning">
                <img src="{{ asset('icons/sun.png') }}" alt="new" class="w-7">
                <span class="text-xl">Top Sellers</span>

            </div>
            <div
                class="w-full bg-[linear-gradient(to_right,#4f4f4f2e_1px,transparent_1px),linear-gradient(to_bottom,#4F4F4F00_1px,transparent_1px)] bg-[size:6rem_4rem]">
                <div>
                    <div class="grid grid-cols-1 sm:grid-cols-2  md:grid-cols-2 lg:grid-cols-3  gap-4 p-3 lg:px-16">
                        @foreach ($featuredProducts as $product)
                            @if ($product->description || $product->variations || $product->getFirstMedia())
                                <x-card.main1 :$product />
                            @else
                                <x-card.main2 :$product />
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif



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
                <h4 class="font-bold text-lg mb-2 pb-1 flex items-center content-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <div>
                        Add-Ons for {{ $category->name }}
                    </div>
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
                                <td class="text-right">{{ '$' . number_format($addon->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endforeach
    <x-socials.flower :$settings />
    <x-footer.main />
</div>
