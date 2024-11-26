<x-layouts.main>
    <!-- Dashboard Container -->
    <div class="flex h-screen ">
        <!-- Sidebar -->
        <div id="Sidebar" class="w-48 shadow-lg shadow-black">
            <aside class="flex flex-col h-full text-white bg-gray-800">
                <h2 class="py-6 text-xl font-bold text-center">ZhulProperty</h2>
                <nav class="flex flex-col px-4 space-y-4">
                    <a href="#dashboard" class="px-4 py-2 rounded hover:bg-gray-700">Postingan</a>
                </nav>
            </aside>
        </div>

        <!-- Main Content -->
        <div id="Content" class="w-full p-6 overflow-y-auto ">
            <main class="flex-col bg-white shadow-lg rounded-xl">
                {{-- Count Informtion  --}}
                <!-- Header -->
                <div class="flex justify-between">
                    <header class="flex flex-col items-start p-4 text-black ">
                        <h1 class="">Name : {{ Auth::user()->name }}</h1>
                        <h1 class="">No Tlp : {{ Auth::user()->no }}</h1>
                        <h1 class="">User Id : {{ Auth::user()->id }}</h1>
                    </header>
                    <header class="flex flex-col items-start p-4 text-black ">
                        @if (Auth::Check())
                            <p class="mt-6 text-gray-500 ">sisa kuota postingan anda : {{ Auth::user()->quota }}
                        @endif
                    </header>

                </div>

                <!-- Add Nomor Section -->
                <section id="add-nomor">
                    <div class="p-4 bg-white rounded shadow">
                        <h2 class="mb-4 text-lg font-semibold text-black">Add Nomor</h2>
                        <form action="{{ route('tambahNo') }}" method="POST">
                            @csrf
                            <div>
                                <label for="nomor" class="block text-sm font-medium text-gray-700">Nomor</label>
                                <input type="number" id="nomor" name="no"
                                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200"
                                    required>
                            </div>
                            <button type="submit"
                                class="w-full px-4 py-2 mt-4 text-white bg-blue-500 rounded hover:bg-blue-600">Add
                                Nomor</button>
                        </form>
                    </div>
                </section>



                <!-- Manage Posts Section -->
                <section id="manage-post">
                    <div class="p-4 bg-white rounded shadow">
                        <h2 class="mb-4 text-lg font-semibold">Manage Posts</h2>
                        <table class="w-full border border-collapse border-gray-200">
                            <thead>
                                <tr class="text-gray-600 bg-gray-100">
                                    <th class="p-2 text-left border border-gray-200">ID</th>
                                    <th class="p-2 text-left border border-gray-200">nama</th>
                                    <th class="p-2 text-left border border-gray-200">harga</th>
                                    <th class="p-2 text-left border border-gray-200">di posting</th>
                                    <th class="p-2 text-left border border-gray-200">di lihat</th>
                                    <th class="p-2 text-left border border-gray-200">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $postingan)
                                    <tr>
                                        <td class="p-2 border border-gray-200">1</td>
                                        <td class="p-2 border border-gray-200">{{ $postingan->nama }}</td>
                                        <td class="p-2 border border-gray-200">{{ $postingan->harga }}</td>
                                        <td class="p-2 border border-gray-200">
                                            {{ $postingan->created_at->diffForHumans() }}
                                        </td>
                                        <td class="p-2 border border-gray-200">{{ $postingan->look }}</td>
                                        <td class="p-2 space-x-2 border border-gray-200">

                                            <form action="{{ route('habis') }}" method="POST">
                                                @csrf
                                                <input type="number" name="id" value="{{ $postingan->id }}"
                                                    hidden>
                                                <button type="submit"
                                                    class="px-3 py-1 text-white bg-red-500 rounded hover:bg-red-600">Tandai
                                                    Habis</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                <!-- Additional rows -->
                            </tbody>
                        </table>
                    </div>
                </section>
            </main>
        </div>
    </div>
</x-layouts.main>
