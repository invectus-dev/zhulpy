<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <!-- Title -->
            <h2 class="py-3 text-xl font-semibold text-gray-800">
                {{ __('Store') }}
            </h2>

            <!-- Dropdown -->
            <div id="shop" class="relative inline-block text-left">
                <div x-data="{ open: false, selected: 'Semua' }">
                    <!-- Dropdown Trigger -->
                    <button @click="open = !open"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                        <span x-text="selected"></span>
                        <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 w-48 mt-2 origin-top-right bg-white border border-gray-200 rounded-md shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2"
                        x-cloak>
                        <button @click="selected = 'Semua'; open = false; filterProperties('all')"
                            class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Semua
                        </button>
                        <button @click="selected = 'Jual'; open = false; filterProperties('jual')"
                            class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-green-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-green-400">
                            Jual
                        </button>
                        <button @click="selected = 'Sewa'; open = false; filterProperties('sewa')"
                            class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-yellow-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            Sewa
                        </button>
                    </div>
                </div>
            </div>
        </div>



        <div class="flex justify-between">
            @if (Auth::check())
                @if (Auth::user()->quota >= 1)
                    <div class="" x-data="{ isModalOpen: false }">
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
                                    class="absolute text-gray-400 top-3 right-3 hover:text-gray-600">
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
                                    <input type="number" id="user_id" name="user_id" value="{{ Auth::user()->id }}"
                                        hidden>
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
                                                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}
                                                </option>
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
                                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat
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
                                        <label for="luas_tanah" class="block text-sm font-medium text-gray-700">luas
                                            tanah</label>
                                        <input type="number" id="luas_tanah" name="luas_tanah"
                                            class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200"
                                            required>
                                    </div>
                                    <div>
                                        <label for="luas_bagunan" class="block text-sm font-medium text-gray-700">luas
                                            bangunan</label>
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
                                            class="block text-sm font-medium text-gray-700">Deskripsi
                                            & fasilitas
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
                    <a href="subscribe">
                        <button
                            class="px-5 py-2 mt-6 text-sm font-medium leading-5 text-center text-white capitalize bg-blue-600 rounded-lg hover:bg-blue-500 lg:mx-0 lg:w-auto focus:outline-none">
                            Jual Properti
                        </button>
                    </a>
                @endif
            @endif
        </div>




        <div class="px-6 py-16 mx-auto ">

            <!-- Grid Produk -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($all as $produk)
                    <div class="w-full shadow-xl card bg-base-100 property-card" data-type="{{ $produk->jenis }}">

                        <figure>
                            <img src="{{ $produk->foto[0]->foto ? url('properti/' . $produk->foto[0]->foto) : 'https://via.placeholder.com/300x200' }}"
                                alt="Properti {{ ucfirst($produk->jenis) }}" class="object-cover w-full h-48">
                        </figure>
                        <div class="bg-white rounded-b-lg shadow-lg card-body ">
                            <h2 class="card-title">{{ $produk->nama }}</h2>
                            <p class="text-gray-600">Harga: Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            <p class="text-sm text-black">Tipe: {{ ucfirst($produk->jenis) }}</p>
                            <p class="text-sm text-black">Alamat: {{ ucfirst($produk->alamat) }}</p>
                            <p class="text-sm text-black">Ruangan/Kamar: {{ ucfirst($produk->kamar) }}</p>
                            <p class="text-sm text-black">Dilihat: {{ $produk->look }} x</p>
                            <div class="justify-end card-actions">
                                <a href="{{ url('preview/' . $produk->id) }}"
                                    class="px-4 py-2 font-bold text-white bg-blue-600 rounded-lg shadow-lg hover:bg-blue-700">Lihat
                                    Detail</a>
                            </div>
                        </div>
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
    </x-slot>



</x-app-layout>
