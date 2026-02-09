{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css','resources/css/inventory.css' , 'resources/js/Inventory.js'])
</head>
<body class="bg-gray-100">

    {{-- Header --}}
    <x-header title="Inventory" searchPlaceholder="Search users, reports, or logs...">
        <x-slot name="icon">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
        </x-slot>
    </x-header>

    <div class="flex">

        {{-- Sidebar --}}
        <x-sidebar :items="$sidebarItems ?? [
            [
                'label' => 'Dashboard',
                'url' => route('Inventory_dashboard'),
                'active' => 'Inventory_dashboard',
                'page' => 'Inventory_dashboard',
                'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z\' /></svg>'
            ],
            [
                'label' => 'Products',
                'url' => route('Inventory_Products'),
                'active' => 'Inventory_Products',
                'page' => 'Inventory_products',
                'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
            ],
            [
                'label' => 'Returns',
                'url' => route('Inventory_Returns'),
                'active' => 'Inventory_Returns',
                'page' => 'Inventory_returns',
                'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3\' /></svg>'
            ]
        ]"
        activePage="{{ request()->route()->getName() === 'Inventory_dashboard' ? 'Inventory_dashboard' : (request()->route()->getName() === 'Inventory_products' ? 'Inventory_products' : 'Inventory_returns') }}"
        />

     {{-- Main Content --}}
<main class="pt-15 ml-0 md:ml-64 min-h-screen">
    <div class="p-6">
                @yield('content')

                @php
    // Sample returns data - replace with your actual database query
    $returns = [
        [
            'product_name' => 'Wireless Bluetooth Headphones',
            'category' => 'Electronics',
            'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=100&h=100&fit=crop',
            'brand' => 'Sony',
            'code' => 'WH-1000XM4',
            'sku' => 'SKU 002',
            'price' => 1524,
            'status' => 'Return',
            'purchase_date' => 'January 5, 2026',
            'return_date' => 'January 12, 2026'
        ],
        [
            'product_name' => 'Television',
            'category' => 'Electronics',
            'image' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=100&h=100&fit=crop',
            'brand' => 'TCL',
            'code' => 'TV-TCL-270',
            'sku' => 'SKU 003',
            'price' => 9899,
            'status' => 'Return',
            'purchase_date' => 'December 18, 2025',
            'return_date' => 'December 28, 2025'
        ],
        [
            'product_name' => 'Smart Watch Series 7',
            'category' => 'Electronics',
            'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=100&h=100&fit=crop',
            'brand' => 'Samsung',
            'code' => 'WATCH-S7-GPS',
            'sku' => 'SKU 003',
            'price' => 5670,
            'status' => 'Return',
            'purchase_date' => 'January 3, 2025',
            'return_date' => 'January 10, 2025'
        ],
        [
            'product_name' => 'Wireless Bluetooth Headphones',
            'category' => 'Electronics',
            'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=100&h=100&fit=crop',
            'brand' => 'Sony',
            'code' => 'WH-1000XM4',
            'sku' => 'SKU 002',
            'price' => 1524,
            'status' => 'Return',
            'purchase_date' => 'December 22, 2025',
            'return_date' => 'January 2, 2026'
        ],
        [
            'product_name' => 'Television',
            'category' => 'Electronics',
            'image' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=100&h=100&fit=crop',
            'brand' => 'TCL',
            'code' => 'TV-TCL-270',
            'sku' => 'SKU 003',
            'price' => 9899,
            'status' => 'Return',
            'purchase_date' => 'January 8, 2025',
            'return_date' => 'January 13, 2025'
        ],
        [
            'product_name' => 'Smart Watch Series 7',
            'category' => 'Electronics',
            'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=100&h=100&fit=crop',
            'brand' => 'Samsung',
            'code' => 'WATCH-S7-GPS',
            'sku' => 'SKU 003',
            'price' => 5670,
            'status' => 'Return',
            'purchase_date' => 'December 15, 2025',
            'return_date' => 'December 23, 2025'
        ],
        [
            'product_name' => 'Refrigerator',
            'category' => 'Electronics',
            'image' => 'https://images.unsplash.com/photo-1571175443880-49e1d25b2bc5?w=100&h=100&fit=crop',
            'brand' => 'LG',
            'code' => 'REF-TLL-LG01',
            'sku' => 'SKU 003',
            'price' => 20999,
            'status' => 'Return',
            'purchase_date' => 'January 1, 2024',
            'return_date' => 'January 9, 2024'
        ],
        [
            'product_name' => 'Electric Fan',
            'category' => 'Electronics',
            'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=100&h=100&fit=crop',
            'brand' => 'Standard',
            'code' => 'FAN-STNDRD',
            'sku' => 'SKU 003',
            'price' => 1499,
            'status' => 'Return',
            'purchase_date' => 'December 28, 2024',
            'return_date' => 'January 6, 2024'
        ],
    ];
@endphp
                
                {{-- Default content if no @section is defined --}}
                @hasSection('content')
                @else
                <div class="inventory-page">
                    {{-- Returns Table Section --}}
                    <div class="page-section">
                        <div class="table-container">
                            <h2 class="returns-title">Returns</h2>

                            {{-- Search and Filters --}}
                            <div class="table-controls">
                                <div class="search-box-table">
                                    <svg class="search-icon" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    <input type="text" placeholder="Search products..." class="search-input">
                                </div>
                                
                                <div class="table-actions">
                                    <button class="btn-secondary">
                                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                                        </svg>
                                        Sort
                                    </button>
                                    <button class="btn-secondary">
                                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                        </svg>
                                        Filter
                                    </button>
                                </div>
                            </div>

                            {{-- Returns Table --}}
                            <div class="table-wrapper">
                                <table class="products-table returns-table">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT</th>
                                            <th>BRAND</th>
                                            <th>CODE</th>
                                            <th>PRICE</th>
                                            <th>STATUS</th>
                                            <th>Purchase Date</th>
                                            <th>Return Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($returns as $return)
                                        <tr>
                                            <td>
                                                <div class="product-cell">
                                                    <img src="{{ $return['image'] }}" alt="{{ $return['product_name'] }}" class="product-image">
                                                    <div class="product-info">
                                                        <p class="product-name">{{ $return['product_name'] }}</p>
                                                        <p class="product-category">{{ $return['category'] }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="brand">{{ $return['brand'] }}</span></td>
                                            <td><span class="code">{{ $return['code'] }}<br><small>{{ $return['sku'] }}</small></span></td>
                                            <td><span class="price">₱ {{ number_format($return['price'], 0) }}</span></td>
                                            <td><span class="status-badge return">{{ $return['status'] }}</span></td>
                                            <td><span class="date-text">{{ $return['purchase_date'] }}</span></td>
                                            <td><span class="date-text">{{ $return['return_date'] }}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Pagination --}}
                            <div class="pagination">
                                <div class="pagination-info">
                                    Showing 1 to {{ count($returns) }} of {{ count($returns) }} results
                                </div>
                                <div class="pagination-controls">
                                    <button class="pagination-btn" disabled>Previous</button>
                                    <button class="pagination-btn active">1</button>
                                    <button class="pagination-btn">2</button>
                                    <button class="pagination-btn">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </main>
    </div>

    {{-- Mobile menu toggle --}}
    <script>
        const toggleSidebar = () => {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('open');
        };
    </script>
</body>
</html>