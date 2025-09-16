<div id="socials" class="flex flex-wrap justify-center gap-4 my-20">
    @if ($settings->whatsapp_number && $settings->whatsapp_active)
        <a aria-label="Chat on WhatsApp"
           href="https://wa.me/{{ $settings->whatsapp_number }}?text=👋%20Hello%20GoodMorning,%20I%20would%20like%20to%20place%20an%20order!"
           target="_blank"
           class="btn btn-circle btn-neutral size-14 hover:scale-110 transition-transform shadow-md">
            <img src="{{ asset('icons/whatsapp.png') }}" alt="whatsapp" class="w-7 h-7">
        </a>
    @endif

    @if ($settings->phone_number && $settings->phone_active)
        <a href="tel:{{ $settings->phone_number }}"
           class="btn btn-circle btn-neutral size-14 hover:scale-110 transition-transform shadow-md"
           aria-label="Call Good Morning">
            <img src="{{ asset('icons/phone.png') }}" alt="Call Good Morning" class="w-7 h-7">
        </a>
    @endif

    @if ($settings->facebook_active && $settings->facebook_url)
        <a href="{{ $settings->facebook_url }}" target="_blank"
           class="btn btn-circle btn-neutral size-14 hover:scale-110 transition-transform shadow-md"
           aria-label="Facebook">
            <img src="{{ asset('icons/facebook.png') }}" alt="Facebook" class="w-7 h-7">
        </a>
    @endif

    @if ($settings->instagram_active && $settings->instagram_url)
        <a href="{{ $settings->instagram_url }}" target="_blank"
           class="btn btn-circle btn-neutral size-14 hover:scale-110 transition-transform shadow-md"
           aria-label="Instagram">
            <img src="{{ asset('icons/instagram.png') }}" alt="Instagram" class="w-7 h-7">
        </a>
    @endif

    @if ($settings->location_url && $settings->location_active)
        <a href="{{ $settings->location_url }}"
           class="btn btn-circle btn-neutral size-14 hover:scale-110 transition-transform shadow-md"
           aria-label="View Good Morning Location">
            <img src="{{ asset('icons/location.png') }}" alt="Location" class="w-7 h-7">
        </a>
    @endif
</div>
