<x-filament-panels::page class="space-y-12 max-w-6xl mx-auto">

    {{-- Header Section --}}
    <x-filament::section>
        <x-slot name="heading">
            Support Center
        </x-slot>
        <x-slot name="description">
            Choose your preferred contact method below and we’ll respond as quickly as possible.
        </x-slot>

        <p class="text-sm text-gray-500 dark:text-gray-400 italic mt-2">
            Managed by <strong>Omar Abi Farraj</strong>
        </p>
    </x-filament::section>

    {{-- Support Options Section --}}
    <x-filament::section>
        <x-slot name="heading">
            Contact Methods
        </x-slot>
        <x-slot name="description">
            Get in touch via Email, WhatsApp, or Phone. Click any card for quick access.
        </x-slot>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-4 space-y-4">
            {{-- Email Card --}}
            <x-filament::section class="p-6 text-center border rounded-xl hover:shadow-lg transition">
                <x-slot name="heading">
                    📧 Email Support
                </x-slot>
                <x-slot name="description">
                    Best for detailed inquiries, file attachments, and non-urgent requests
                </x-slot>
                <div class="mt-4">
                    <a href="mailto:omar.7tech@gmail.com" class="text-red-600 dark:text-red-400 font-medium block mt-2">
                        omar.7tech@gmail.com
                    </a>
                </div>
            </x-filament::section>

            {{-- WhatsApp Card --}}
            <x-filament::section class="p-6 text-center border rounded-xl hover:shadow-lg transition">
                <x-slot name="heading">
                    💬 WhatsApp Chat
                </x-slot>
                <x-slot name="description">
                    Quick responses and real-time communication
                </x-slot>
                <div class="mt-4">
                    <a href="https://wa.me/96171387946" target="_blank" class="text-green-600 dark:text-green-400 font-medium block mt-2">
                        +961 71 387 946
                    </a>
                </div>
            </x-filament::section>

            {{-- Phone Card --}}
            <x-filament::section class="p-6 text-center border rounded-xl hover:shadow-lg transition">
                <x-slot name="heading">
                    📞 Phone Call
                </x-slot>
                <x-slot name="description">
                    Direct conversation for urgent matters and complex discussions
                </x-slot>
                <div class="mt-4">
                    <a href="tel:+96171387946" class="text-blue-600 dark:text-blue-400 font-medium block mt-2">
                        +961 71 387 946
                    </a>
                </div>
            </x-filament::section>
        </div>
    </x-filament::section>

    {{-- Response Times Section --}}
    <x-filament::section>
        <x-slot name="heading">
            ⏱️ Response Times
        </x-slot>
        <x-slot name="description">
            Typical response times for each contact method
        </x-slot>

        <ul class="mt-2 space-y-2 text-sm text-gray-700 dark:text-gray-300">
            <li class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 bg-green-500 rounded-full"></span>
                <span><strong>WhatsApp & Phone:</strong> Within 1–4 hours</span>
            </li>
            <li class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full"></span>
                <span><strong>Email:</strong> Within 24 hours</span>
            </li>
        </ul>
    </x-filament::section>

    {{-- Footer --}}
    <div class="text-center pt-6 border-t border-gray-200 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">
            © {{ date('Y') }} <strong>Omar Abi Farraj</strong> • Professional Support Services
        </p>
    </div>

</x-filament-panels::page>
