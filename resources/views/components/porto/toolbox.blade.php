@props([
    'showFilter' => true,
    'showSort' => true,
    'showCount' => true,
    'showLayout' => true,
    'sticky' => true,
    'sortOptions' => [
        ['value' => 'menu_order', 'text' => 'Default sorting'],
        ['value' => 'popularity', 'text' => 'Sort by popularity'],
        ['value' => 'rating', 'text' => 'Sort by average rating'],
        ['value' => 'date', 'text' => 'Sort by newness'],
        ['value' => 'price', 'text' => 'Sort by price: low to high'],
        ['value' => 'price-desc', 'text' => 'Sort by price: high to low'],
    ],
    'countOptions' => [12, 24, 36],
    'gridUrl' => '/porto/category.html',
    'listUrl' => '/porto/category-list.html',
])

<nav class="toolbox {{ $sticky ? 'sticky-header' : '' }}" @if($sticky) data-sticky-options="{'mobile': true}" @endif>
    <div class="toolbox-left">
        @if($showFilter)
            <a href="#" class="sidebar-toggle">
                <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                    <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                    <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                    <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                    <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                    <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                    <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                    <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                    <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                    <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                    <path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                </svg>
                <span>Filter</span>
            </a>
        @endif

        @if($showSort)
            <div class="toolbox-item toolbox-sort">
                <label>Sort By:</label>
                <div class="select-custom">
                    <select name="orderby" class="form-control">
                        @foreach($sortOptions as $option)
                            <option value="{{ $option['value'] }}" {{ isset($option['selected']) && $option['selected'] ? 'selected="selected"' : '' }}>
                                {{ $option['text'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- End .select-custom -->
            </div>
            <!-- End .toolbox-item -->
        @endif
    </div>
    <!-- End .toolbox-left -->

    <div class="toolbox-right">
        @if($showCount)
            <div class="toolbox-item toolbox-show">
                <label>Show:</label>
                <div class="select-custom">
                    <select name="count" class="form-control">
                        @foreach($countOptions as $count)
                            <option value="{{ $count }}">{{ $count }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- End .select-custom -->
            </div>
            <!-- End .toolbox-item -->
        @endif

        @if($showLayout)
            <div class="toolbox-item layout-modes">
                <a href="{{ $gridUrl }}" class="layout-btn btn-grid active" title="Grid">
                    <i class="icon-mode-grid"></i>
                </a>
                <a href="{{ $listUrl }}" class="layout-btn btn-list" title="List">
                    <i class="icon-mode-list"></i>
                </a>
            </div>
            <!-- End .layout-modes -->
        @endif
    </div>
    <!-- End .toolbox-right -->
</nav>

