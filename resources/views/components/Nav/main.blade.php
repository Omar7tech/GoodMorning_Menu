<div class="navbar bg-base-100 shadow-sm flex justify-between">
    <a class="">
        <img src="{{ asset('images/logo.png') }}" alt="" class="w-20 px-3">
    </a>

    @if ($settings->whatsapp_active && $settings->whatsapp_number && $settings->whatsapp_number_on_top)
        <a aria-label="Chat on WhatsApp" class=""
            href="https://wa.me/{{ $settings->whatsapp_number }}?text=👋%20Hello%20GoodMorning,%20I%20would%20like%20to%20place%20an%20order!"
            target="_blank">
            <img src="{{ asset('icons/WhatsAppButtonGreenSmall.png') }}" alt="Chat On Whatsapp" class="h-10">
        </a>
    @endif
</div>
