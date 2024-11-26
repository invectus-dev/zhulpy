<x-layouts.main>
    <!-- Dashboard Container -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="flex flex-col w-1/5 text-white bg-gray-800">
            <h2 class="py-6 text-xl font-bold text-center">ZhulProperty</h2>
            <nav class="flex flex-col px-4 space-y-4">
                <a href="#dashboard" class="px-4 py-2 rounded hover:bg-gray-700">Dashboard</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 space-y-6">
            <!-- Header -->
            <header class="flex items-center justify-between p-4 bg-white rounded shadow">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
            </header>

            <!-- Dashboard Section -->
            <section id="dashboard">
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-lg font-semibold">Welcome to ZhulProperty Admin</h2>
                    <p class="mt-2 text-gray-600">Use the menu to manage posts, users, and settings.</p>
                </div>
            </section>

            <!-- Manage Posts Section -->
            <section id="manage-post">
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="mb-4 text-lg font-semibold">user</h2>
                    <table class="w-full border border-collapse border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2 text-left border border-gray-200">ID</th>
                                <th class="p-2 text-left border border-gray-200">user</th>
                                <th class="p-2 text-left border border-gray-200">postingan</th>
                                <th class="p-2 text-left border border-gray-200">kuota</th>
                                <th class="p-2 text-left border border-gray-200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $users)
                                <tr>
                                    <td class="p-2 border border-gray-200">{{ $users->id }}</td>
                                    <td class="p-2 border border-gray-200">{{ $users->name }}</td>
                                    <td class="p-2 border border-gray-200">{{ $users->postingan->count() }}</td>
                                    <td class="p-2 border border-gray-200">{{ $users->quota }}</td>
                                    <td class="p-2 space-x-2 border border-gray-200">
                                        <div x-data="{ open: false }">
                                            <button @click="open = true"
                                                class="px-3 py-1 text-white bg-green-500 rounded hover:bg-gren-600">Tambah
                                                Quota</button>

                                            <div x-show="open" x-cloak
                                                class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
                                                <div @click.away="open = false"
                                                    class="relative bg-white w-full max-w-md mx-auto rounded-lg shadow-lg overflow-y-auto p-6">
                                                    <button @click="open = false"
                                                        class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>

                                                    <h2 class="text-2xl font-semibold text-gray-800">Tambah Quota</h2>
                                                    <p class="mt-2 text-gray-600">Masukkan jumlah quota yang ingin
                                                        ditambahkan.</p>

                                                    <form action="{{ route('addQuota') }}" method="POST"
                                                        class="mt-4">
                                                        @csrf
                                                        <input type="number" name="user_id" value="{{ $users->id }}"
                                                            hidden>
                                                        <input type="number" name="quota" min="1"
                                                            class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200"
                                                            required>
                                                        <button type="submit"
                                                            class="w-full px-4 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none">
                                                            Tambah
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            <!-- Additional rows -->
                        </tbody>
                    </table>
                </div>
            </section>



            <!-- Manage Users Section -->
            <section id="manage-users">
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="mb-4 text-lg font-semibold">kategori</h2>
                    <form action="{{ route('tambahKategori') }}" method="POST" class="mt-4">
                        @csrf
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                            <input type="text" id="nama" name="kategori"
                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200" required>
                        </div>
                        <button type="submit"
                            class="w-full px-4 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none">
                            Tambah
                        </button>
                    </form>
                    <table class="w-full border border-collapse border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2 text-left border border-gray-200">kategori</th>
                                <th class="p-2 text-left border border-gray-200">produk terkait</th>
                                <th class="p-2 text-left border border-gray-200">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $kat)
                                <tr>
                                    <td class="p-2 border border-gray-200">{{ $kat->kategori }}</td>
                                    <td class="p-2 border border-gray-200">{{ $kat->produk->count() }}</td>
                                    <td class="p-2 space-x-2 border border-gray-200">
                                        <form action="{{ route('hapusKategori', $kat->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 text-white bg-red-500 rounded hover:bg-red-600">Hapus</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                            <!-- Additional rows -->
                        </tbody>
                    </table>
                    <!-- Form -->
                    <form action="{{ route('selling') }}" method="POST" class="mt-4 space-y-4" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                            <input type="file" id="foto" name="foto[]"
                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200" multiple required>
                        </div>
                        @csrf
                        <input type="number" id="user_id" name="user_id" value="{{ Auth::user()->id }}" hidden>
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama
                                Properti</label>
                            <input type="text" id="nama" name="nama"
                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200" required>
                        </div>
                
                
                        <div>
                            <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select id="kategori_id" name="kategori_id"
                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200" required>
                                @foreach ($kategori as $kats)
                                    <option value="{{ $kats->id }}">{{ $kats->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="kamar" class="block text-sm font-medium text-gray-700">jumlah
                                ruagan/kamar</label>
                            <input type="text" id="kamar" name="kamar"
                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200" required>
                        </div>
                        <div>
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat
                                Properti</label>
                            <input type="text" id="alamat" name="alamat"
                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200" required>
                        </div>
                        <div>
                            <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                            <input type="number" id="harga" name="harga"
                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200" required>
                        </div>
                        <div>
                            <label for="luas_tanah" class="block text-sm font-medium text-gray-700">luas tanah</label>
                            <input type="number" id="luas_tanah" name="luas_tanah"
                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200" required>
                        </div>
                        <div>
                            <label for="luas_bagunan" class="block text-sm font-medium text-gray-700">luas
                                bangunan</label>
                            <input type="number" id="luas_bagunan" name="luas_bagunan"
                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200" required>
                        </div>
                
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">status</label>
                            <select id="status" name="status"
                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200" required>
                                <option value="baru">baru</option>
                                <option value="bekas">bekas</option>
                            </select>
                        </div>
                        <div>
                            <label for="jenis" class="block text-sm font-medium text-gray-700">jenis</label>
                            <select id="jenis" name="jenis"
                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200" required>
                                <option value="jual">jual</option>
                                <option value="sewa">sewa</option>
                            </select>
                        </div>
                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi &
                                fasilitas
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
            </section>
        </main>
    </div>

</x-layouts.main>
