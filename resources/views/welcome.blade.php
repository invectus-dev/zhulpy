<x-layouts.main>
    <section class="h-screen bg-white ">
        <nav x-data="{ isOpen: false }" class="container p-6 mx-auto lg:flex lg:justify-between lg:items-center">
            <div class="flex items-center justify-between">
                <a href="dashboard" class="text-2xl font-bold text-gray-800 lg:text-3xl">
                    ZhulProperty
                </a>

                <!-- Mobile menu button -->
                <div class="flex lg:hidden">
                    <button x-cloak @click="isOpen = !isOpen" type="button"
                        class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600 "
                        aria-label="toggle menu">
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                        </svg>

                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white shadow-md lg:bg-transparent lg:shadow-none lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">
                <div class="flex flex-col space-y-4 lg:mt-0 lg:flex-row lg:-px-8 lg:space-y-0">
                    <a href="{{ route('postingan') }}" class="text-blue-500 font-semibold transition-colors duration-300 transform lg:mx-8 hover:text-blue-600"
                        href="#">postingan</a>
                    <a class="text-gray-700 transition-colors duration-300 transform lg:mx-8 hover:text-blue-500"
                        href="#">Components</a>
                    <a class="text-gray-700 transition-colors duration-300 transform lg:mx-8 hover:text-blue-500"
                        href="#">Pricing</a>
                    <a class="text-gray-700 transition-colors duration-300 transform lg:mx-8 hover:text-blue-500"
                        href="#">Contact</a>
                </div>

                <a class="block px-5 py-2 mt-4 text-sm text-center text-white capitalize bg-blue-600 rounded-lg lg:mt-0 hover:bg-blue-500 lg:w-auto"
                    href="dashboard">
                    Get started
                </a>
            </div>
        </nav>

        <div class="container px-6 py-16 mx-auto text-center">
            <div class="max-w-lg mx-auto">
                <h1 class="text-3xl font-semibold text-gray-800 lg:text-4xl">solusi bagi pasangan muda
                    yang lagi cari rumah</h1>
                @if (Auth::check())
                    <p class="mt-6 text-gray-500 ">sisa kuota postingan anda : {{ Auth::user()->quota }}
                    @else
                    <p class="mt-6 text-gray-500 ">Ingin jual/beli rumah? registrasi sekarang! free 1x promosi.
                @endif
                <br />
                </p>
                @if (Auth::check())
                    @if (Auth::user()->quota >= 1)
                        <div x-data="{ isModalOpen: false }">
                            <!-- Button to open modal -->
                            <a href="#" @click.prevent="isModalOpen = true">
                                <button
                                    class="px-5 py-2 mt-6 text-sm font-medium leading-5 text-center text-white capitalize bg-blue-600 rounded-lg hover:bg-blue-500 lg:mx-0 lg:w-auto focus:outline-none">
                                    Jual Properti
                                </button>
                            </a>

                            <!-- Modal Background -->
                            <div x-show="isModalOpen" x-cloak
                                class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
                                <!-- Modal -->
                                <div @click.away="isModalOpen = false"
                                    class="relative bg-white w-full max-w-3xl mx-auto rounded-lg shadow-lg overflow-y-auto p-6 max-h-[90vh]">
                                    <!-- Close Button -->
                                    <button @click="isModalOpen = false"
                                        class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>

                                    <!-- Modal Content -->
                                    <h2 class="text-2xl font-semibold text-gray-800">Jual Properti</h2>
                                    <p class="mt-2 text-gray-600">
                                        Silakan masukkan detail properti Anda di bawah ini untuk memulai penjualan.
                                    </p>

                                    <!-- Form -->
                                    <form action="{{ route('selling') }}" method="POST" class="mt-4 space-y-4"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div>
                                            <label for="foto"
                                                class="block text-sm font-medium text-gray-700">Foto</label>
                                            <input type="file" id="foto" name="foto[]"
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200"
                                                multiple required>
                                        </div>
                                        @csrf
                                        <input type="number" id="user_id" name="user_id"
                                            value="{{ Auth::user()->id }}" hidden>
                                        <div>
                                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama
                                                Properti</label>
                                            <input type="text" id="nama" name="nama"
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200"
                                                required>
                                        </div>


                                        <div>
                                            <label for="kategori_id"
                                                class="block text-sm font-medium text-gray-700">Kategori</label>
                                            <select id="kategori_id" name="kategori_id"
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200"
                                                required>
                                                @foreach ($kat as $kategori)     
                                                <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="kamar" class="block text-sm font-medium text-gray-700">jumlah
                                                ruagan/kamar</label>
                                            <input type="text" id="kamar" name="kamar"
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200"
                                                required>
                                        </div>
                                        <div>
                                            <label for="alamat"
                                                class="block text-sm font-medium text-gray-700">Alamat
                                                Properti</label>
                                            <input type="text" id="alamat" name="alamat"
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200"
                                                required>
                                        </div>
                                        <div>
                                            <label for="harga"
                                                class="block text-sm font-medium text-gray-700">Harga</label>
                                            <input type="number" id="harga" name="harga"
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200"
                                                required>
                                        </div>
                                        <div>
                                            <label for="luas_tanah"
                                                class="block text-sm font-medium text-gray-700">luas tanah</label>
                                            <input type="number" id="luas_tanah" name="luas_tanah"
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200"
                                                required>
                                        </div>
                                        <div>
                                            <label for="luas_bagunan"
                                                class="block text-sm font-medium text-gray-700">luas bangunan</label>
                                            <input type="number" id="luas_bagunan" name="luas_bagunan"
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200"
                                                required>
                                        </div>

                                        <div>
                                            <label for="status"
                                                class="block text-sm font-medium text-gray-700">status</label>
                                            <select id="status" name="status"
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200"
                                                required>
                                                <option value="baru">baru</option>
                                                <option value="bekas">bekas</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="jenis"
                                                class="block text-sm font-medium text-gray-700">jenis</label>
                                            <select id="jenis" name="jenis"
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200"
                                                required>
                                                <option value="jual">jual</option>
                                                <option value="sewa">sewa</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="deskripsi"
                                                class="block text-sm font-medium text-gray-700">Deskripsi & fasilitas
                                                tambahan</label>
                                            <textarea id="deskripsi" name="fasilitas_tambahan" rows="4"
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200" required></textarea>
                                        </div>


                                        <!-- Add all other fields here -->

                                        <button type="submit"
                                            class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none">
                                            Kirim
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="login">
                            <button
                                class="px-5 py-2 mt-6 text-sm font-medium leading-5 text-center text-white capitalize bg-blue-600 rounded-lg hover:bg-blue-500 lg:mx-0 lg:w-auto focus:outline-none">
                                Jual Properti
                            </button>
                        </a>
                    @endif
                    <a href="#shop">
                        <button
                            class="px-5 py-2 mt-6 text-sm font-medium leading-5 text-center text-white capitalize bg-green-600 rounded-lg hover:bg-green-500 lg:mx-0 lg:w-auto focus:outline-none">
                            Cari Properti
                        </button>
                    </a>
                @else
                    <a href="login">
                        <button
                            class="px-5 py-2 mt-6 text-sm font-medium leading-5 text-center text-white capitalize bg-blue-600 rounded-lg hover:bg-blue-500 lg:mx-0 lg:w-auto focus:outline-none">
                            Registration for free
                        </button>
                    </a>
                @endif

                <p class="mt-3 text-sm text-gray-400 "></p>
            </div>

            <div class="flex justify-center mt-10">
                <img class="object-cover w-full h-96 rounded-xl lg:w-4/5"
                    src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80" />
            </div>
        </div>
        <!-- Filter Buttons -->
        <div id="shop" class="container px-6 mx-auto mt-6 text-center">
            <div class="flex justify-center space-x-4">
                <button class="px-5 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                    onclick="filterProperties('all')">
                    Semua
                </button>
                <button class="px-5 py-2 bg-green-500 text-white rounded hover:bg-green-600"
                    onclick="filterProperties('jual')">
                    Jual
                </button>
                <button class="px-5 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600"
                    onclick="filterProperties('sewa')">
                    Sewa
                </button>
            </div>
        </div>

        <!-- Property Cards -->
        <div class="container mx-auto px-6 py-16">

            <!-- Grid Produk -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($all as $produk)
                    <div class="property-card bg-white rounded shadow-md p-4 md:p-6" data-type="{{ $produk->jenis }}">
                        <img src="{{ $produk->foto[0]->foto ? url('properti/' . $produk->foto[0]->foto) : 'https://via.placeholder.com/300x200' }}"
                            alt="Properti {{ ucfirst($produk->jenis) }}" class="rounded mb-4 md:mb-8">
                        <h2 class="text-2xl font-bold">{{ $produk->nama }}</h2>
                        <p class="text-gray-600 text-lg">Harga: Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-500">Tipe: {{ ucfirst($produk->jenis) }}</p>
                        <p class="text-sm text-gray-500">Tipe: {{ ucfirst($produk->alamat) }}</p>
                        <p class="text-sm text-gray-500 mb-5">ruangan/kamar: {{ ucfirst($produk->kamar) }}</p>
                        <p class="text-sm text-gray-500 mb-5">Dilihat: {{ $produk->look }} x</p>
                        <a href="{{url('preview/' . $produk->id)}}" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Lihat Detail
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- JavaScript untuk Filter -->
        <script>
            function filterProperties(type) {
                const cards = document.querySelectorAll('.property-card');
                cards.forEach((card) => {
                    if (type === 'all' || card.dataset.type === type) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            }
        </script>
    </section>
</x-layouts.main>
