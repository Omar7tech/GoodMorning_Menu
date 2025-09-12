<div class="bg-base-200 space-y-5">
    <x-hero.main />

    <x-categories.main1 :$categories />


    @foreach ($categories as $category)
        @if ($category->design == 1)
            <x-category-header.main1 :$category />
        @else
            <x-category-header.main2 :$category />
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2  md:grid-cols-2 lg:grid-cols-3  gap-4 p-3 lg:px-16">
            @foreach ($category->products as $product)
                <x-card.main1 :$product />
            @endforeach
        </div>

        @if ($category->addons()->exists())
            <div class="overflow-x-auto p-3 lg:px-16">
                <table class="table table-zebra">
                    <thead>
                        <tr>
                            <th>Add On</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category->addons as $addon)
                            <tr>
                                <td>{{ $addon->name }}</td>
                                <td>{{ $addon->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endforeach




</div>
