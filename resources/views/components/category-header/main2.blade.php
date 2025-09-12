@props(['category'])
<div id="{{ $category->slug }}" class="w-full max-w-4xl mx-auto px-6 py-8 sm:py-12 lg:py-16 text-center lg:text-left">
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-neutral tracking-tight uppercase">
        {{ $category->name }}
    </h1>
</div>
