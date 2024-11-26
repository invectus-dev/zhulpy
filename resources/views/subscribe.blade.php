<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Subscribe') }}
        </h2>
    </x-slot>

    <div class="grid max-w-4xl gap-6 mx-auto mt-8 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Basic Plan -->
        <div class="bg-white shadow-lg card hover:shadow-xl">
            <div class="card-body">
                <h3 class="text-lg font-bold text-gray-800 card-title">Basic Plan</h3>
                <p class="text-gray-600">10 postingan.</p>
                <p class="mt-4 text-2xl font-bold text-blue-600">Rp 100.000</p>
                <a href="https://api.whatsapp.com/send?phone=6285795356178&text=Halo%20saya%20ingin%20membeli%20paket%20Basic%20Plan"
                    target="_blank" class="w-full mt-6 btn btn-primary">
                    Pilih Plan
                </a>
            </div>
        </div>

        <!-- Standard Plan -->
        <div class="bg-white shadow-lg card hover:shadow-xl">
            <div class="card-body">
                <h3 class="text-lg font-bold text-gray-800 card-title">Standard Plan</h3>
                <p class="text-gray-600">100 postingan.</p>
                <p class="mt-4 text-2xl font-bold text-blue-600">Rp 500.000</p>
                <a href="https://api.whatsapp.com/send?phone=6285795356178&text=Halo%20saya%20ingin%20membeli%20paket%20Standard%20Plan"
                    target="_blank" class="w-full mt-6 btn btn-primary">
                    Pilih Plan
                </a>
            </div>
        </div>

        <!-- Premium Plan -->
        <div class="bg-white shadow-lg card hover:shadow-xl">
            <div class="card-body">
                <h3 class="text-lg font-bold text-gray-800 card-title">Premium Plan</h3>
                <p class="text-gray-600">Unlimited + Iklan.</p>
                <p class="mt-4 text-2xl font-bold text-blue-600">Rp 1.000.000</p>
                <a href="https://api.whatsapp.com/send?phone=6285795356178&text=Halo%20saya%20ingin%20membeli%20paket%20Premium%20Plan"
                    target="_blank" class="w-full mt-6 btn btn-primary">
                    Pilih Plan
                </a>
            </div>
        </div>
    </div>

    </div>

</x-app-layout>
