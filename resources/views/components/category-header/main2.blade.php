@props(['category'])

<section id="{{ $category->slug }}"
         class="w-full max-w-4xl mx-auto px-6 py-8 sm:py-12 lg:py-16 text-center lg:text-left scroll-mt-20"
         itemscope itemtype="https://schema.org/CategoryCodeSet">

    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-neutral tracking-tight uppercase"
        itemprop="name">
        {{ $category->name }}
    </h1>

    @if(!empty($category->description))
        <p class="mt-4 text-base sm:text-lg md:text-xl text-neutral-600 leading-relaxed max-w-2xl"
           itemprop="description">
            {{ $category->description }}
        </p>
    @endif
</section>
