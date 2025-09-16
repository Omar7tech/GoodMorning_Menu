@props(['settings'])

<div class="fab">
    <!-- a focusable div with tabindex is necessary to work on all browsers. role="button" is necessary for accessibility -->
    <div tabindex="0" role="button" class="btn btn-xl btn-circle bg-green-400">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
        </svg>

    </div>

    @if ($settings->whatsapp_number && $settings->whatsapp_active)
        <div>
            Whatsapp
            <a aria-label="Chat on WhatsApp" class="btn btn-xl btn-circle"
                href="https://wa.me/{{ $settings->whatsapp_number }}?text=👋%20Hello%20GoodMorning,%20I%20would%20like%20to%20place%20an%20order!"
                target="_blank">
                <img src="{{ asset('icons/whatsapp.png') }}" alt="whatsapp" class="w-6">
            </a>
        </div>
    @endif

    @if ($settings->phone_number && $settings->phone_active)
        <div>
            Phone - {{ $settings->phone_number }}
            <a class="btn btn-xl btn-circle" href="tel:{{ $settings->phone_number }}">
                <img src="{{ asset('icons/phone.png') }}" alt="phone" class="w-6">
            </a>
        </div>
    @endif
    @if ($settings->location && $settings->location_active)
        <div>
            Location
            <a class="btn btn-xl btn-circle" href="{{ $settings->location }}">
                <img src="{{ asset('icons/location.png') }}" alt="location" class="w-6">
            </a>
        </div>
    @endif

</div>
