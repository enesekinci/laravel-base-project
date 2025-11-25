@props(['columns', 'items', 'actions' => true])

<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 bg-white rounded-lg shadow">
        <thead class="bg-gray-50">
            <tr>
                @foreach($columns as $column)
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $column['label'] }}
                    </th>
                @endforeach
                @if($actions)
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                @endif
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($items as $item)
                <tr class="hover:bg-gray-50">
                    @foreach($columns as $column)
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            @if(isset($column['slot']))
                                {{ ${$column['slot']} }}
                            @elseif(isset($column['render']))
                                {!! $column['render']($item) !!}
                            @else
                                {{ data_get($item, $column['key']) }}
                            @endif
                        </td>
                    @endforeach
                    @if($actions)
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                @if(isset($item->deleted_at))
                                    <button 
                                        onclick="restoreItem({{ $item->id }})"
                                        class="text-green-600 hover:text-green-900"
                                        title="Restore"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                    </button>
                                @else
                                    <a 
                                        href="{{ $editUrl ?? '#' }}/{{ $item->id }}/edit"
                                        class="text-blue-600 hover:text-blue-900"
                                        title="Edit"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <button 
                                        onclick="deleteItem({{ $item->id }})"
                                        class="text-red-600 hover:text-red-900"
                                        title="Delete"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) + ($actions ? 1 : 0) }}" class="px-6 py-4 text-center text-sm text-gray-500">
                        No items found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

