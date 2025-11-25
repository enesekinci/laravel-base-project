@props(['filters' => []])

<div class="bg-white p-4 rounded-lg shadow mb-4" x-data="{ filters: {} }">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Search -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
            <input 
                type="text" 
                x-model="filters.search"
                @input.debounce.500ms="applyFilters()"
                placeholder="Search..."
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
        </div>

        <!-- Status Filter -->
        @if(in_array('status', $filters))
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select 
                    x-model="filters.status"
                    @change="applyFilters()"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
                    <option value="">All</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        @endif

        <!-- Is Active Filter -->
        @if(in_array('is_active', $filters))
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Is Active</label>
                <select 
                    x-model="filters.is_active"
                    @change="applyFilters()"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
                    <option value="">All</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        @endif

        <!-- Date Range -->
        @if(in_array('date_range', $filters))
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                <div class="flex space-x-2">
                    <input 
                        type="date" 
                        x-model="filters.date_from"
                        @change="applyFilters()"
                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                    <input 
                        type="date" 
                        x-model="filters.date_to"
                        @change="applyFilters()"
                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                </div>
            </div>
        @endif
    </div>

    <div class="mt-4 flex justify-end">
        <button 
            @click="resetFilters()"
            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200"
        >
            Reset Filters
        </button>
    </div>
</div>

<script>
function applyFilters() {
    // Bu fonksiyon parent component'te override edilecek
    if (window.applyTableFilters) {
        window.applyTableFilters();
    }
}

function resetFilters() {
    // Bu fonksiyon parent component'te override edilecek
    if (window.resetTableFilters) {
        window.resetTableFilters();
    }
}
</script>

