@props(['category'])

<div id="{{ $category->slug }}"
     class="relative w-full h-32 sm:h-48 md:h-64 lg:h-72 overflow-hidden rounded-none scroll-mt-20">
    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 hover:scale-105"
        style="background-image: url('{{ $category->getFirstMediaUrl() }}');">
    </div>
    <div class="absolute inset-0 bg-black/50 lg:bg-gradient-to-r lg:from-black/70 lg:via-black/40 lg:to-transparent">
    </div>
    <div class="relative z-10 flex items-center justify-center lg:justify-start h-full px-6 lg:px-12">
        <div class="text-center lg:text-left max-w-lg">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white drop-shadow-lg">
                <div class="status status-lg status-warning animate-bounce"></div>
                {{ $category->name }}
            </h2>
            <p class="mt-2 text-sm sm:text-base md:text-lg text-gray-200 leading-snug">
                {{ $category->description }}
            </p>
        </div>
    </div>
</div>
