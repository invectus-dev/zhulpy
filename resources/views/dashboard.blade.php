<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Store') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Basic Plan -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800">Basic Plan</h3>
            <p class="mt-2 text-gray-600">10 postingan.</p>
            <p class="mt-4 text-2xl font-bold text-blue-600">Rp 100.000</p>
            <a href="https://api.whatsapp.com/send?phone=6285951362309&text=Halo%20saya%20ingin%20membeli%20paket%20Basic%20Plan"
                target="_blank" class="mt-6 w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Pilih Plan
            </a>
        </div>

        <!-- Standard Plan -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800">Standard Plan</h3>
            <p class="mt-2 text-gray-600">100 postingan.</p>
            <p class="mt-4 text-2xl font-bold text-blue-600">Rp 500.000</p>
            <a href="https://api.whatsapp.com/send?phone=6285951362309&text=Halo%20saya%20ingin%20membeli%20paket%20Basic%20Plan"
                target="_blank" class="mt-6 w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Pilih Plan
            </a>
        </div>

        <!-- Premium Plan -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800">Premium Plan</h3>
            <p class="mt-2 text-gray-600">unlimited + iklan.</p>
            <p class="mt-4 text-2xl font-bold text-blue-600">Rp 1.00.000</p>
            <a href="https://api.whatsapp.com/send?phone=6285951362309&text=Halo%20saya%20ingin%20membeli%20paket%20Basic%20Plan"
                target="_blank" class="mt-6 w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Pilih Plan
            </a>
        </div>
    </div>

</x-app-layout>
