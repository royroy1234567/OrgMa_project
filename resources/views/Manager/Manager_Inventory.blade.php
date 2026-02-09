<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    @vite(['resources/css/app.css', 'resources/css/inventory.css', 'resources/js/Inventory.js'])
    <style>
        .card { box-shadow: 0 1px 3px rgba(0,0,0,0.08); }

        /* Status badges */
        .badge-in-stock    { background: #d1fae5; color: #065f46; }
        .badge-low-stock   { background: #fef3c7; color: #92400e; }
        .badge-out-of-stock { background: #fee2e2; color: #991b1b; }

        /* Tab active */
        .tab-active { background: #2563eb; color: #fff; }
        .tab-inactive { background: #fff; color: #4b5563; border: 1px solid #e5e7eb; }
        .tab-inactive:hover { background: #f3f4f6; }

        /* Sort / Filter buttons */
        .btn-sort-filter {
            background: #2563eb;
            color: #fff;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.45rem 0.75rem;
            border-radius: 0.5rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            border: none;
        }
        .btn-sort-filter:hover { background: #1d4ed8; }
        .btn-dropdown-arrow {
            background: #1d4ed8;
            color: #fff;
            padding: 0.45rem 0.55rem;
            border-radius: 0 0.5rem 0.5rem 0;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
        }
        .btn-dropdown-arrow:hover { background: #1e40af; }
        .btn-sort-main { border-radius: 0.5rem 0 0 0.5rem; }

        /* Pagination */
        .page-btn {
            width: 2rem; height: 2rem;
            display: inline-flex; align-items: center; justify-content: center;
            border: 1px solid #e5e7eb;
            background: #fff;
            border-radius: 0.375rem;
            font-size: 0.82rem;
            color: #374151;
            cursor: pointer;
        }
        .page-btn:hover { background: #f3f4f6; }
        .page-btn.active { background: #2563eb; color: #fff; border-color: #2563eb; }
        .page-btn-nav { color: #6b7280; font-size: 0.8rem; font-weight: 500; background: #fff; border: 1px solid #e5e7eb; border-radius: 0.375rem; padding: 0.3rem 0.7rem; cursor: pointer; }
        .page-btn-nav:hover { background: #f3f4f6; }
        .page-btn-nav:disabled { opacity: 0.4; cursor: default; }

        /* Action icon buttons */
        .action-btn { background: none; border: none; cursor: pointer; padding: 0.2rem; border-radius: 0.25rem; }
        .action-btn:hover { background: #f3f4f6; }
        .action-btn.delete:hover { background: #fee2e2; }
    </style>
</head>
<body class="bg-gray-100">

{{-- ─── HEADER ─────────────────────────────────────────── --}}
<x-header
    title="Manager"
    searchPlaceholder="Search users, reports, or logs..."
>
    <x-slot name="icon">
        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
        </svg>
    </x-slot>
</x-header>

{{-- ─── FLEX WRAP: SIDEBAR + MAIN ───────────────────────── --}}
<div class="flex">

    {{-- SIDEBAR --}}
    <x-sidebar :items="[
        [
            'label' => 'Dashboard',
            'url' => route('Manager_dashboard'),
            'active' => 'Manager_dashboard',
            'page' => 'dashboard',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z\' /></svg>'
        ],
        [
            'label' => 'Sales',
            'url' => route('Manager_Sales'),
            'active' => 'Manager_Sales*',
            'page' => 'sales',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
        [
            'label' => 'Inventory',
            'url' => route('Manager_inventory'),
            'active' => 'Manager_inventory*',
            'page' => 'inventory',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3\' /></svg>'
        ],
        [
            'label' => 'Reports',
            'url' => route('Manager_Reports'),
            'active' => 'Manager_Reports*',
            'page' => 'reports',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3\' /></svg>'
        ],
        [
            'label' => 'Customers',
            'url' => route('Manager_Customers'),
            'active' => 'Manager_Customers*',
            'page' => 'customers',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3\' /></svg>'
        ],
        [
            'label' => 'Orders',
            'url' => route('Manager_Orders'),
            'active' => 'Manager_Orders*',
            'page' => 'orders',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3\' /></svg>'
        ],
        [
            'label' => 'Returns',
            'url' => route('Manager_Return'),
            'active' => 'Manager_Return*',
            'page' => 'return',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3\' /></svg>'
        ],
        [
            'label' => 'Branch',
            'url' => route('Manager_Branch'),
            'active' => 'Manager_Branch*',
            'page' => 'branch',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3\' /></svg>'
        ],
        [
            'label' => 'Settings',
            'url' => route('Manager_Settings'),
            'active' => 'Manager_Settings*',
            'page' => 'settings',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3\' /></svg>'
        ],
    ]"
    activePage="inventory"
    />

    {{-- ─── MAIN CONTENT ──────────────────────────────── --}}
    <main class="flex-1 mt-16 p-6 md:ml-64 transition-all duration-300">

        <!-- ── PAGE HEADING ──────────────────────────────── -->
        <div class="mb-5">
            <h2 class="text-lg font-semibold text-gray-800">Inventory Summary</h2>
        </div>

        <!-- ── 4 SUMMARY CARDS ───────────────────────────── -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

            <!-- Total Product -->
            <div class="card bg-white rounded-xl p-5 flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 mb-1">Total Product</p>
                    <p class="text-2xl font-bold text-gray-800">225</p>
                </div>
                <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>

            <!-- In Stock (green) -->
            <div class="card bg-white rounded-xl p-5 flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 mb-1">In Stock</p>
                    <p class="text-2xl font-bold text-green-600">198</p>
                </div>
                <div class="w-11 h-11 bg-green-50 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H9a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                </div>
            </div>

            <!-- Low Stock (orange) -->
            <div class="card bg-white rounded-xl p-5 flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 mb-1">Low Stock</p>
                    <p class="text-2xl font-bold text-orange-500">15</p>
                </div>
                <div class="w-11 h-11 bg-orange-50 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376a12 12 0 1021.593 0M12 15.75h.008v.008H12v-.008z"/>
                    </svg>
                </div>
            </div>

            <!-- Out of Stock (red) -->
            <div class="card bg-white rounded-xl p-5 flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 mb-1">Out of Stock</p>
                    <p class="text-2xl font-bold text-red-600">12</p>
                </div>
                <div class="w-11 h-11 bg-red-50 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-6 6m6 0l-6-6" stroke-width="2.5"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- ── TABS: All Products / Low Stock / Out of Stock ── -->
        <div class="flex gap-2 mb-4" id="filterTabs">
            <button class="tab-active px-4 py-1.5 rounded-lg text-sm font-semibold transition-colors" data-filter="all" onclick="setTab(this,'all')">All Products</button>
            <button class="tab-inactive px-4 py-1.5 rounded-lg text-sm font-semibold transition-colors" data-filter="low" onclick="setTab(this,'low')">Low Stock</button>
            <button class="tab-inactive px-4 py-1.5 rounded-lg text-sm font-semibold transition-colors" data-filter="out" onclick="setTab(this,'out')">Out of Stock</button>
        </div>

        <!-- ── SEARCH BAR + SORT / FILTER ─────────────────── -->
        <div class="card bg-white rounded-xl p-4 mb-4">
            <div class="flex items-center gap-3">
                <!-- Search input -->
                <div class="relative flex-1">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                    <input type="text" placeholder="Search products..." id="searchInput" oninput="filterTable()"
                           class="w-full pl-9 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-300 bg-gray-50">
                </div>

                <!-- Sort button + arrow -->
                <div class="flex">
                    <button class="btn-sort-filter btn-sort-main">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M3 4.5h18M5.5 9.5h13M8 14.5h8M10.5 19.5h3"/></svg>
                        Sort
                    </button>
                    <button class="btn-dropdown-arrow">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                    </button>
                </div>

                <!-- Filter button + arrow -->
                <div class="flex">
                    <button class="btn-sort-filter btn-sort-main">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M3 4.5h18v2.25L13.5 12.75V19.5l-3 1.5v-8.25L3 6.75V4.5z"/></svg>
                        Filter
                    </button>
                    <button class="btn-dropdown-arrow">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- ── PRODUCT TABLE ─────────────────────────────── -->
        <div class="card bg-white rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm" id="inventoryTable">
                    <thead class="bg-gray-50">
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Product</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Brand</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Code</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Quantity</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Price</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Status</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody id="inventoryBody">
                        @php
                            $products = [
                                [
                                    'name'     => 'Wireless Bluetooth Headphones',
                                    'category' => 'Electronics',
                                    'brand'    => 'Sony',
                                    'code'     => 'WH-1000XM4',
                                    'sku'      => 'SKU-001',
                                    'qty'      => 45,
                                    'price'    => '1,524',
                                    'status'   => 'in_stock',
                                    'icon'     => '🎧',
                                ],
                                [
                                    'name'     => 'Television',
                                    'category' => 'Electronics',
                                    'brand'    => 'TCL',
                                    'code'     => 'TV-TCL-270',
                                    'sku'      => 'SKU-002',
                                    'qty'      => 8,
                                    'price'    => '9,899',
                                    'status'   => 'low_stock',
                                    'icon'     => '📺',
                                ],
                                [
                                    'name'     => 'Smart Watch Series 7',
                                    'category' => 'Electronics',
                                    'brand'    => 'Samsung',
                                    'code'     => 'WATCH-S7-GPS',
                                    'sku'      => 'SKU-003',
                                    'qty'      => 0,
                                    'price'    => '5,670',
                                    'status'   => 'out_of_stock',
                                    'icon'     => '⌚',
                                ],
                                [
                                    'name'     => 'Refrigerator',
                                    'category' => 'Electronics',
                                    'brand'    => 'LG',
                                    'code'     => 'REF-TLL-LG01',
                                    'sku'      => 'SKU-004',
                                    'qty'      => 35,
                                    'price'    => '20,999',
                                    'status'   => 'in_stock',
                                    'icon'     => '🧊',
                                ],
                                [
                                    'name'     => 'Electric Fan',
                                    'category' => 'Electronics',
                                    'brand'    => 'Standard',
                                    'code'     => 'FAN-STNDRD',
                                    'sku'      => 'SKU-005',
                                    'qty'      => 25,
                                    'price'    => '1,499',
                                    'status'   => 'in_stock',
                                    'icon'     => '🌀',
                                ],
                            ];
                        @endphp

                        @foreach ($products as $p)
                        @php
                            $statusClass = match($p['status']) {
                                'in_stock'     => 'badge-in-stock',
                                'low_stock'    => 'badge-low-stock',
                                'out_of_stock' => 'badge-out-of-stock',
                                default        => '',
                            };
                            $statusLabel = match($p['status']) {
                                'in_stock'     => 'In Stock',
                                'low_stock'    => 'Low Stock',
                                'out_of_stock' => 'Out of Stock',
                                default        => '',
                            };
                        @endphp
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors" data-status="{{ $p['status'] }}">
                            <!-- Product (icon + name + category) -->
                            <td class="py-3.5 px-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-xl">
                                        {{ $p['icon'] }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800 text-sm">{{ $p['name'] }}</p>
                                        <p class="text-xs text-gray-400">{{ $p['category'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <!-- Brand -->
                            <td class="py-3.5 px-4 text-gray-600">{{ $p['brand'] }}</td>
                            <!-- Code + SKU -->
                            <td class="py-3.5 px-4">
                                <p class="text-gray-700 font-medium">{{ $p['code'] }}</p>
                                <p class="text-xs text-gray-400">{{ $p['sku'] }}</p>
                            </td>
                            <!-- Quantity -->
                            <td class="py-3.5 px-4 text-gray-700 font-medium">{{ $p['qty'] }}</td>
                            <!-- Price -->
                            <td class="py-3.5 px-4 text-gray-700 font-medium">₱ {{ $p['price'] }}</td>
                            <!-- Status badge -->
                            <td class="py-3.5 px-4">
                                <span class="{{ $statusClass }} inline-block text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $statusLabel }}</span>
                            </td>
                            <!-- Actions: view / edit / delete -->
                            <td class="py-3.5 px-4">
                                <div class="flex items-center gap-2">
                                    <!-- Eye -->
                                    <button class="action-btn text-blue-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z"/></svg>
                                    </button>
                                    <!-- Pencil -->
                                    <button class="action-btn text-green-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    </button>
                                    <!-- Trash -->
                                    <button class="action-btn delete text-red-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- ── PAGINATION ──────────────────────────────── -->
            <div class="flex items-center justify-between px-4 py-3.5 border-t border-gray-100 bg-gray-50">
                <p class="text-xs text-gray-500" id="paginationInfo">Showing 1 to 5 of 5 results</p>
                <div class="flex items-center gap-1.5">
                    <button class="page-btn-nav" disabled>Previous</button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn-nav">Next</button>
                </div>
            </div>
        </div>

    </main>
</div>

<!-- ── INLINE JS: Tab filter + Search filter ────────────── -->
<script>
    // Tab switching
    function setTab(btn, filter) {
        document.querySelectorAll('#filterTabs button').forEach(b => {
            b.classList.remove('tab-active');
            b.classList.add('tab-inactive');
        });
        btn.classList.remove('tab-inactive');
        btn.classList.add('tab-active');

        // Filter rows
        const rows = document.querySelectorAll('#inventoryBody tr');
        rows.forEach(row => {
            const status = row.dataset.status;
            if (filter === 'all') {
                row.style.display = '';
            } else if (filter === 'low') {
                row.style.display = status === 'low_stock' ? '' : 'none';
            } else if (filter === 'out') {
                row.style.display = status === 'out_of_stock' ? '' : 'none';
            }
        });
        updateCount();
    }

    // Search filter
    function filterTable() {
        const query = document.getElementById('searchInput').value.toLowerCase();
        const rows  = document.querySelectorAll('#inventoryBody tr');
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            // Only hide if visible by tab AND doesn't match search
            if (row.style.display === 'none') return; // respect tab filter
            row.style.display = text.includes(query) ? '' : 'none';
        });
        updateCount();
    }

    // Update "Showing X of Y"
    function updateCount() {
        const rows   = document.querySelectorAll('#inventoryBody tr');
        const visible = [...rows].filter(r => r.style.display !== 'none').length;
        document.getElementById('paginationInfo').textContent = `Showing 1 to ${visible} of ${visible} results`;
    }
</script>

</body>
</html>