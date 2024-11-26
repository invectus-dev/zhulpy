<x-layouts.main>

    <style>
        .carousel-item {
            display: none;
        }

        .carousel-item.active {
            display: block;
        }
    </style>
    <!-- Header -->
    <header class="bg-blue-600 text-white text-center py-4">
        <h1 class="text-3xl font-bold">Preview Properti</h1>
    </header>

    <!-- Property Detail Section -->
    <div class="container mx-auto py-8 px-6">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="relative">
                <!-- Carousel for Photos -->
                <div class="carousel">

                    <div class="carousel-item  active">
                        <img src="{{ url('properti/' . $product->foto[0]->foto) }}" alt="Properti 1"
                            class="w-full h-64 object-cover">
                    </div>
                    @foreach ($product->foto as $foto)
                        <div class="carousel-item  ">
                            <img src="{{ url('properti/' . $foto->foto) }}" alt="Properti 1"
                                class="w-full h-64 object-cover">
                        </div>
                    @endforeach
                    <!-- Carousel Navigation Buttons -->
                    <button onclick="changeSlide(-1)"
                        class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">‹</button>
                    <button onclick="changeSlide(1)"
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">›</button>
                </div>

                <!-- Property Details -->
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-800"> {{ $product->nama }} </h2>
                    <p class="text-gray-600 mt-2">Lokasi: {{$product->alamat}}</p>
                    <p class="text-gray-600 mt-1">Luas Tanah: {{$product->luas_tanah}}</p>
                    <p class="text-gray-600 mt-1">Luas bangunan: {{$product->bangunan}}</p>
                    <p class="text-gray-600 mt-1">Kamar Tidur: {{$product->kamar}}</p>
                    <p class="text-gray-600 mt-1">kategori: {{$product->kategori->kategori}}</p>
                    <p class="text-2xl font-bold text-blue-600 mt-4">Rp {{number_format($product->harga)}}</p>

                    <!-- Description -->
                    <p class="mt-4 text-gray-700">{{$product->fasilitas_tambahan}}</p>

                    <!-- Contact Button -->
                    <a href="https://api.whatsapp.com/send?phone={{ $product->user->no }}&text=Halo%20saya%20tertarik%20dengan%20{{$product->nama}}"
                        class="mt-6 inline-block px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                        Hubungi Penjual
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentSlide = 0;

        function changeSlide(direction) {
            const slides = document.querySelectorAll('.carousel-item');
            slides[currentSlide].classList.remove('active');

            currentSlide = (currentSlide + direction + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
        }
    </script>
</x-layouts.main>
