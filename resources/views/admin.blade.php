<x-layouts.main>
    <!-- Dashboard Container -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="flex flex-col w-1/5 text-white bg-gray-800">
            <h2 class="py-6 text-xl font-bold text-center">ZhulProperty</h2>
            <nav class="flex flex-col px-4 space-y-4">
                <a href="#dashboard" class="px-4 py-2 rounded hover:bg-gray-700">Dashboard</a>
                <a href="#manage-post" class="px-4 py-2 rounded hover:bg-gray-700">Manage Posts</a>
                <a href="#manage-users" class="px-4 py-2 rounded hover:bg-gray-700">Manage Users</a>
                <a href="#settings" class="px-4 py-2 rounded hover:bg-gray-700">Post Limit</a>
                <a href="#logout" class="px-4 py-2 rounded hover:bg-gray-700">Logout</a>
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
                    <h2 class="mb-4 text-lg font-semibold">Manage Posts</h2>
                    <table class="w-full border border-collapse border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2 text-left border border-gray-200">ID</th>
                                <th class="p-2 text-left border border-gray-200">Title</th>
                                <th class="p-2 text-left border border-gray-200">Owner</th>
                                <th class="p-2 text-left border border-gray-200">Date</th>
                                <th class="p-2 text-left border border-gray-200">Status</th>
                                <th class="p-2 text-left border border-gray-200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2 border border-gray-200">1</td>
                                <td class="p-2 border border-gray-200">Beautiful House</td>
                                <td class="p-2 border border-gray-200">John Doe</td>
                                <td class="p-2 border border-gray-200">2024-11-23</td>
                                <td class="p-2 border border-gray-200">Published</td>
                                <td class="p-2 space-x-2 border border-gray-200">

                                    <button
                                        class="px-3 py-1 text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                                </td>
                            </tr>
                            <!-- Additional rows -->
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Manage Users Section -->
            <section id="manage-users">
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="mb-4 text-lg font-semibold">Manage Users</h2>
                    <table class="w-full border border-collapse border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2 text-left border border-gray-200">ID</th>
                                <th class="p-2 text-left border border-gray-200">Name</th>
                                <th class="p-2 text-left border border-gray-200">Email</th>
                                <th class="p-2 text-left border border-gray-200">Total Posts</th>
                                <th class="p-2 text-left border border-gray-200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2 border border-gray-200">1</td>
                                <td class="p-2 border border-gray-200">John Doe</td>
                                <td class="p-2 border border-gray-200">johndoe@example.com</td>
                                <td class="p-2 border border-gray-200">5</td>
                                <td class="p-2 border border-gray-200">
                                    <button class="px-3 py-1 text-white bg-red-500 rounded hover:bg-red-600">Delete
                                        User</button>
                                </td>
                            </tr>
                            <!-- Additional rows -->
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Post Limit Section -->
            <section id="settings">
                <div class="p-4 bg-white rounded shadow" x-data="{ userId: '', postLimit: '' }">
                    <h2 class="mb-4 text-lg font-semibold">Set Post Limit by User</h2>
                    <form @submit.prevent="alert('Post limit updated for User ID: ' + userId + ' to ' + postLimit)">
                        <div class="flex space-x-4">
                            <div>
                                <label for="user-id" class="block text-sm font-medium text-gray-700">User ID</label>
                                <input type="number" id="user-id" x-model="userId" placeholder="Enter User ID"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="post-limit" class="block text-sm font-medium text-gray-700">Post
                                    Limit</label>
                                <input type="number" id="post-limit" x-model="postLimit" placeholder="Enter Post Limit"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>
                        <button type="submit"
                            class="px-4 py-2 mt-4 text-white bg-blue-500 rounded hover:bg-blue-600">Set Limit</button>
                    </form>
                </div>
            </section>
        </main>
    </div>
</x-layouts.main>
