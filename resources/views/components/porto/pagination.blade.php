@props([
    'currentPage' => 1,
    'totalPages' => 1,
    'baseUrl' => '#',
    'showInfo' => true,
])

@if($totalPages > 1)
    <nav class="toolbox toolbox-pagination">
        @if($showInfo)
            <div class="toolbox-item toolbox-show">
                <label>Show:</label>
                <div class="select-custom">
                    <select name="count" class="form-control">
                        <option value="12">12</option>
                        <option value="24">24</option>
                        <option value="36">36</option>
                    </select>
                </div>
                <!-- End .select-custom -->
            </div>
        @endif

        <ul class="pagination toolbox-item">
            @if($currentPage > 1)
                <li class="page-item">
                    <a class="page-link page-link-btn" href="{{ $baseUrl }}?page={{ $currentPage - 1 }}">
                        <i class="icon-angle-left"></i>
                    </a>
                </li>
            @endif

            @for($i = 1; $i <= $totalPages; $i++)
                @if($i == 1 || $i == $totalPages || ($i >= $currentPage - 2 && $i <= $currentPage + 2))
                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                        <a class="page-link" href="{{ $baseUrl }}?page={{ $i }}">{{ $i }}</a>
                    </li>
                @elseif($i == $currentPage - 3 || $i == $currentPage + 3)
                    <li class="page-item">
                        <span class="page-link">...</span>
                    </li>
                @endif
            @endfor

            @if($currentPage < $totalPages)
                <li class="page-item">
                    <a class="page-link page-link-btn" href="{{ $baseUrl }}?page={{ $currentPage + 1 }}">
                        <i class="icon-angle-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif

