<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Counters') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-4">
        <div class="flex justify-end mb-4">
            <button type="button"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                onclick="openCreateModal()">
                Create Counter
            </button>
        </div>

        <!-- Counter List -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($counters as $counter)
                <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                    <div class="text-lg font-semibold mb-2">{{ $counter->name }}</div>
                    <div>Count: {{ $counter->count }}</div>
                    <div class="flex justify-end mt-4">
                        <button type="button"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            onclick="openEditModal({{ $counter->id }})">
                            Edit
                        </button>
                        <form action="{{ route('admin.counters.destroy', $counter->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2 focus:outline-none focus:shadow-outline"
                                onclick="return confirm('Are you sure you want to delete this counter?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Create Counter Modal -->
    <div id="createModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="createModalLabel"
        role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form action="{{ route('admin.counters.store') }}" method="POST">
                    @csrf
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <label for="name"
                                class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="count"
                                class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Count:</label>
                            <input type="number" name="count" id="count"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                                required>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create</button>
                        <button type="button"
                            class="inline-block bg-gray-300 dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline sm:mr-2 mt-2 sm:mt-0"
                            onclick="closeCreateModal()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Counter Modal -->
    <div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="editModalLabel"
        role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form id="editForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <label for="edit_name"
                                class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="edit_name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_count"
                                class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Count:</label>
                            <input type="number" name="count" id="edit_count"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                                required>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save
                            Changes</button>
                        <button type="button"
                            class="inline-block bg-gray-300 dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline sm:mr-2 mt-2 sm:mt-0"
                            onclick="closeEditModal()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
        }

        function openEditModal(id) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editForm').action = "{{ route('admin.counters.update', '') }}/" + id;
            fetchCounterData(id);
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function fetchCounterData(id) {
            fetch("{{ route('admin.counters.index') }}/" + id)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_count').value = data.count;
                });
        }
    </script>
</x-app-layout>
