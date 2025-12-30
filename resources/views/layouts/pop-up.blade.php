<div id="deleteModal"
     class="fixed inset-0 bg-white bg-opacity-50 hidden items-center justify-center z-50 hidden">

    <div class="bg-white w-[400px] rounded shadow-lg p-6">
        <h2 class="text-lg font-bold mb-4">Confirm Delete</h2>

        <p class="mb-6 text-gray-700">
            Are you sure you want to delete this record?
        </p>

        <div class="flex justify-end gap-3">
            <button id="cancelDelete"
                    class="px-4 py-2 bg-gray-300">
                Cancel
            </button>

            <button id="confirmDelete"
                    class="px-4 py-2 bg-red-600 text-white">
                Delete
            </button>
        </div>
    </div>
</div>
