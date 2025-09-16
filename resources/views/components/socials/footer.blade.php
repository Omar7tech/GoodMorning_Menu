<div id="socials" class=" flex justify-center content-center gap-2 my-20">
    @if ($settings->whatsapp_number && $settings->whatsapp_active)
        <div>
            <a aria-label="Chat on WhatsApp" class="btn btn-xl btn-circle btn-neutral"
                href="https://wa.me/{{ $settings->whatsapp_number }}?text=👋%20Hello%20GoodMorning,%20I%20would%20like%20to%20place%20an%20order!"
                target="_blank">
                <img src="{{ asset('icons/whatsapp.png') }}" alt="whatsapp" class="w-6 h-6">
            </a>
        </div>
    @endif

    @if ($settings->phone_number && $settings->phone_active)
        <div>
            <a class="btn btn-xl btn-circle btn-neutral" href="tel:{{ $settings->phone_number }}">
                <img src="{{ asset('icons/phone.png') }}" alt="Call Good Morning" class="w-6 h-6">
            </a>
        </div>
    @endif
    @if ($settings->facebook_active && $settings->facebook_url)
        <div>
            <a class="btn btn-xl btn-circle btn-neutral" href="{{ $settings->facebook_url }}" target="_blank">
                <img src="{{ asset('icons/facebook.png') }}" alt="Facebook" class="w-6 h-6">
            </a>
        </div>
    @endif
    @if ($settings->instagram_active && $settings->instagram_url)
        <div>
            <a class="btn btn-xl btn-circle btn-neutral" href="{{ $settings->instagram_url }}" target="_blank">
                <img src="{{ asset('icons/instagram.png') }}" alt="Instagram" class="w-6 h-6">
            </a>
        </div>
    @endif
    @if ($settings->location_url && $settings->location_active)
        <div>
            <a class="btn btn-xl btn-circle btn-neutral" href="{{ $settings->location_url }}">
                <img src="{{ asset('icons/location.png') }}" alt="View Good Morning Location" class="w-6 h-6">
            </a>
        </div>
    @endif
</div>
