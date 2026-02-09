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
        <main class="pt-13 ml-0 md:ml-64 min-h-screen">
            <div class="p-6">
                @yield('content')

                @hasSection('content')
                @else
                <?php
                    $stats = $stats ?? [
                        ['label' => 'Total Product',  'value' => '225', 'color' => 'blue'],
                        ['label' => 'In Stock',       'value' => '198', 'color' => 'green'],
                        ['label' => 'Low Stock',      'value' => '15',  'color' => 'orange'],
                        ['label' => 'Out of Stock',   'value' => '12',  'color' => 'red'],
                    ];

                    $products = $products ?? [
                        [
                            'name'     => 'Wireless Bluetooth Headphones',
                            'category' => 'Electronics',
                            'image'    => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=100&h=100&fit=crop',
                            'brand'    => 'Sony',
                            'code'     => 'WH-1000XM4',
                            'sku'      => 'SKU 002',
                            'quantity' => 45,
                            'price'    => '1,524',
                            'status'   => 'in-stock',
                        ],
                        [
                            'name'     => 'Television',
                            'category' => 'Electronics',
                            'image'    => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=100&h=100&fit=crop',
                            'brand'    => 'TCL',
                            'code'     => 'TV-TCL-270',
                            'sku'      => 'SKU 003',
                            'quantity' => 8,
                            'price'    => '9,899',
                            'status'   => 'low-stock',
                        ],
                        [
                            'name'     => 'Smart Watch Series 7',
                            'category' => 'Electronics',
                            'image'    => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=100&h=100&fit=crop',
                            'brand'    => 'Samsung',
                            'code'     => 'WATCH-S7-GPS',
                            'sku'      => 'SKU 004',
                            'quantity' => 0,
                            'price'    => '5,670',
                            'status'   => 'out-of-stock',
                        ],
                    ];

                    $statIcons = [
                        'blue' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none"><path d="M8 10h24v20H8z" fill="currentColor" opacity="0.2"/><path d="M12 6h16v4H12zM8 10h24M8 30h24M16 14v12M24 14v12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
                        'green' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none"><path d="M20 8L8 14v12l12 6 12-6V14L20 8z" fill="currentColor" opacity="0.2"/><path d="M20 8L8 14v12l12 6 12-6V14L20 8zM20 20v12M8 14l12 6M32 14l-12 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                        'orange' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none"><path d="M20 8l8 14H12l8-14z" fill="currentColor" opacity="0.2"/><path d="M20 8l8 14H12l8-14zM20 16v4M20 24h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                        'red' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none"><path d="M20 32c6.627 0 12-5.373 12-12S26.627 8 20 8 8 13.373 8 20s5.373 12 12 12z" fill="currentColor" opacity="0.2"/><path d="M20 32c6.627 0 12-5.373 12-12S26.627 8 20 8 8 13.373 8 20s5.373 12 12 12zM26 14l-12 12M14 14l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                    ];

                    $statusLabels = [
                        'in-stock'     => 'In Stock',
                        'low-stock'    => 'Low Stock',
                        'out-of-stock' => 'Out of Stock',
                    ];
                ?>

                <div class="inventory-page">

                    {{-- SUMMARY CARDS --}}
                    <div class="page-section">
                        <h2 class="text-3xl font-semibold mb-2.5">Inventory Summary</h2>

                        <div class="stats-grid">
                            @foreach ($stats as $stat)
                            <div class="stat-card">
                                <div class="stat-content">
                                    <div class="stat-info">
                                        <p class="stat-label">{{ $stat['label'] }}</p>
                                        <h3 class="stat-value {{ $stat['color'] !== 'blue' ? $stat['color'] : '' }}">{{ $stat['value'] }}</h3>
                                    </div>
                                    <div class="stat-icon {{ $stat['color'] }}">
                                        {!! $statIcons[$stat['color']] !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- PRODUCTS TABLE --}}
                    <div class="page-section">
                        <div class="table-container">

                            <div class="tabs">
                                <button class="tab active">All Products</button>
                                <button class="tab">Low Stock</button>
                                <button class="tab">Out of Stock</button>
                            </div>

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

                            <div class="table-wrapper">
                                <table class="products-table">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT</th>
                                            <th>BRAND</th>
                                            <th>CODE</th>
                                            <th>QUANTITY</th>
                                            <th>PRICE</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                <div class="product-cell">
                                                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-image">
                                                    <div class="product-info">
                                                        <p class="product-name">{{ $product['name'] }}</p>
                                                        <p class="product-category">{{ $product['category'] }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="brand">{{ $product['brand'] }}</span></td>
                                            <td>
                                                <span class="code">
                                                    {{ $product['code'] }}<br>
                                                    <small>{{ $product['sku'] }}</small>
                                                </span>
                                            </td>
                                            <td><span class="quantity">{{ $product['quantity'] }}</span></td>
                                            <td><span class="price">₱ {{ $product['price'] }}</span></td>
                                            <td>
                                                <span class="status-badge {{ $product['status'] }}">
                                                    {{ $statusLabels[$product['status']] }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="action-btn view" title="View">
                                                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                        </svg>
                                                    </button>
                                                    <button class="action-btn edit" title="Edit">
                                                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                        </svg>
                                                    </button>
                                                    <button class="action-btn delete" title="Delete">
                                                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="pagination">
                                <div class="pagination-info">
                                    Showing 1 to {{ count($products) }} of {{ count($products) }} results
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

</body>
</html>