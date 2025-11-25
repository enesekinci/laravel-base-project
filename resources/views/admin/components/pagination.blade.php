@props(['meta'])

@if($meta && $meta['last_page'] > 1)
    <div class="flex items-center justify-between mt-4">
        <div class="text-sm text-gray-700">
            Showing {{ $meta['from'] }} to {{ $meta['to'] }} of {{ $meta['total'] }} results
        </div>
        <div class="flex space-x-2">
            <!-- Previous -->
            <button 
                onclick="changePage({{ $meta['current_page'] - 1 }})"
                @if($meta['current_page'] <= 1) disabled @endif
                class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
            >
                Previous
            </button>

            <!-- Page Numbers -->
            @for($i = 1; $i <= $meta['last_page']; $i++)
                @if($i == 1 || $i == $meta['last_page'] || ($i >= $meta['current_page'] - 2 && $i <= $meta['current_page'] + 2))
                    <button 
                        onclick="changePage({{ $i }})"
                        class="px-3 py-2 text-sm font-medium rounded-lg {{ $i == $meta['current_page'] ? 'bg-blue-600 text-white' : 'text-gray-700 bg-white border border-gray-300 hover:bg-gray-50' }}"
                    >
                        {{ $i }}
                    </button>
                @elseif($i == $meta['current_page'] - 3 || $i == $meta['current_page'] + 3)
                    <span class="px-3 py-2 text-sm text-gray-700">...</span>
                @endif
            @endfor

            <!-- Next -->
            <button 
                onclick="changePage({{ $meta['current_page'] + 1 }})"
                @if($meta['current_page'] >= $meta['last_page']) disabled @endif
                class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
            >
                Next
            </button>
        </div>
    </div>
@endif

<script>
function changePage(page) {
    // Bu fonksiyon parent component'te override edilecek
    if (window.changeTablePage) {
        window.changeTablePage(page);
    }
}
</script>

