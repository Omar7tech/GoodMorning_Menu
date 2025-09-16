@props(['category'])

<section id="{{ $category->slug }}"
         class="relative w-full max-w-4xl mx-auto px-6 py-8 sm:py-12 lg:py-16 text-center lg:text-left scroll-mt-20 overflow-hidden"
         itemscope itemtype="https://schema.org/CategoryCodeSet">

    <!-- Background Layer -->
    <div
        class="absolute inset-0 z-0"
        style="
            background-image:
                linear-gradient(to right, rgba(71,85,105,0.15) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(71,85,105,0.15) 1px, transparent 1px),
                radial-gradient(circle at 50% 60%, rgba(236,72,153,0.15) 0%, rgba(168,85,247,0.05) 40%, transparent 70%);
            background-size: 40px 40px, 40px 40px, 100% 100%;
        ">
    </div>

    <!-- Foreground Content -->
    <div class="relative z-10">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight uppercase"
            itemprop="name">
            {{ $category->name }}
        </h1>

        @if(!empty($category->description))
            <p class="mt-4 text-base sm:text-lg md:text-xl leading-relaxed max-w-2xl"
               itemprop="description">
                {{ $category->description }}
            </p>
        @endif
    </div>
</section>
