@props(['categories'])
<div class="sticky top-0 z-50 bg-base-200/85 backdrop-blur-md scrollbar-hide scroll-smooth">
    <div class="w-full relative">
        <div class="absolute left-2 top-1/2 -translate-y-1/2 z-10 opacity-60">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 text-base-content/60">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </div>
        <div class="absolute right-2 top-1/2 -translate-y-1/2 z-10 opacity-60 animate-pulse">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 text-base-content/60">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </div>
        <div class="flex overflow-x-auto gap-3 px-8 py-4 scrollbar-hide scroll-smooth">
            @foreach ($categories as $category)
                <div class="flex-shrink-0 group cursor-pointer">
                    <a href="#{{ $category->slug }}">
                        <div
                            class="relative min-w-14 h-14 rounded-xl overflow-hidden ring-2 ring-transparent group-hover:ring-primary group-active:ring-primary transition-all duration-200">
                            @if($category->getFirstMediaUrl())
                                <!-- With Image -->
                                <img loading="lazy" src="{{ $category->getFirstMediaUrl() }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-200" />
                                <!-- Text inside image -->
                                <div
                                    class="absolute bottom-0 inset-x-0 bg-black/40 text-[10px] text-white text-center p-1 leading-tight">
                                    {{ $category->name }}
                                </div>
                            @else
                                <!-- Without Image - Professional Minimal -->
                                <div class="w-full h-full flex items-center justify-center bg-base-300 border border-base-content/10 group-hover:bg-base-100 group-hover:border-base-content/20 transition-all duration-200">
                                    <div class="text-center px-2">
                                        <div class="text-[9px] text-base-content font-medium leading-tight">
                                            {{ $category->name }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
