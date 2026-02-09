<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/css/inventory.css', 'resources/js/Inventory.js'])
    <style>
        .card { box-shadow: 0 1px 3px rgba(0,0,0,0.08); }
        .badge-in-stock { background: #d1fae5; color: #065f46; }
        .trend-up   { color: #16a34a; }
        .trend-down { color: #dc2626; }
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
    activePage="dashboard"
    />

    {{-- ─── MAIN CONTENT ──────────────────────────────── --}}
    <main class="flex-1 mt-16 p-6 md:ml-64 transition-all duration-300">

        <!-- HEADING -->
        <div class="mb-5">
            <h2 class="text-lg font-semibold text-gray-800">Dashboard Overview</h2>
        </div>

        <!-- ── OVERVIEW CARDS ──────────────────────────── -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

            <!-- Sales Today -->
            <div class="card bg-white rounded-xl p-5 flex items-start justify-between">
                <div>
                    <p class="text-xs text-gray-500 mb-1">Sales Today</p>
                    <p class="text-2xl font-bold text-gray-800">₱145,230</p>
                    <span class="trend-up text-xs font-medium">↑ 12.5%</span>
                </div>
                <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="card bg-white rounded-xl p-5 flex items-start justify-between">
                <div>
                    <p class="text-xs text-gray-500 mb-1">Total Orders</p>
                    <p class="text-2xl font-bold text-gray-800">342 <span class="text-base font-normal text-gray-500">Orders</span></p>
                    <span class="trend-up text-xs font-medium">↑ 8.2%</span>
                </div>
                <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>

            <!-- Low Stock Items -->
            <div class="card bg-white rounded-xl p-5 flex items-start justify-between">
                <div>
                    <p class="text-xs text-gray-500 mb-1">Low Stock Items</p>
                    <p class="text-2xl font-bold text-gray-800">18</p>
                    <span class="trend-down text-xs font-medium">↓ 3</span>
                </div>
                <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>

            <!-- Top Products -->
            <div class="card bg-white rounded-xl p-5 flex items-start justify-between">
                <div>
                    <p class="text-xs text-gray-500 mb-1">Top Products</p>
                    <p class="text-xl font-bold text-gray-800">Refrigerator</p>
                    <span class="text-xs font-semibold text-green-600">Trending</span>
                </div>
                <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-5.518-3.54a.563.563 0 00-.588 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- ── CHARTS ROW ──────────────────────────────── -->
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-4 mb-6">

            <!-- Sales Overview — 3 cols -->
            <div class="card bg-white rounded-xl p-5 lg:col-span-3">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-semibold text-gray-800">Sales Overview</h2>
                    <span class="text-xs border border-gray-200 rounded-lg px-3 py-1 text-gray-500 cursor-pointer hover:bg-gray-50">7 days ▾</span>
                </div>
                <div style="height: 200px;">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <!-- Branch Performance — 2 cols -->
            <div class="card bg-white rounded-xl p-5 lg:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-semibold text-gray-800">Branch Performance</h2>
                </div>
                <div style="height: 200px;">
                    <canvas id="branchChart"></canvas>
                </div>
            </div>
        </div>

        <!-- ── TOP SELLING PRODUCTS TABLE ────────────────── -->
        <div class="card bg-white rounded-xl p-5">
            <h2 class="text-sm font-semibold text-gray-800 mb-4">Top Selling Products</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="text-left py-2 px-3 text-gray-500 font-medium">Product</th>
                            <th class="text-left py-2 px-3 text-gray-500 font-medium">Category</th>
                            <th class="text-left py-2 px-3 text-gray-500 font-medium">Sales</th>
                            <th class="text-left py-2 px-3 text-gray-500 font-medium">Revenue</th>
                            <th class="text-left py-2 px-3 text-gray-500 font-medium">Stock</th>
                            <th class="text-left py-2 px-3 text-gray-500 font-medium">Trend</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $products = [
                                ['name' => 'Samsung Refrigerator', 'cat' => 'Appliances', 'sales' => '1,342', 'rev' => '₱500,545', 'stock' => 'In Stock', 'trend' => '+12%', 'up' => true],
                                ['name' => 'LG Washing Machine',   'cat' => 'Appliances', 'sales' => '987',   'rev' => '₱410,210', 'stock' => 'In Stock', 'trend' => '+8%',  'up' => true],
                                ['name' => 'Sony TV 55"',          'cat' => 'Appliances', 'sales' => '500',   'rev' => '₱300,545', 'stock' => 'In Stock', 'trend' => '+7%',  'up' => true],
                                ['name' => 'Panasonic AC',         'cat' => 'Appliances', 'sales' => '157',   'rev' => '₱250,560', 'stock' => 'In Stock', 'trend' => '+5%',  'up' => true],
                            ];
                        @endphp

                        @foreach ($products as $p)
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-3 font-medium text-gray-800">{{ $p['name'] }}</td>
                            <td class="py-3 px-3 text-gray-500">{{ $p['cat'] }}</td>
                            <td class="py-3 px-3 text-gray-600">{{ $p['sales'] }}</td>
                            <td class="py-3 px-3 text-gray-700 font-medium">{{ $p['rev'] }}</td>
                            <td class="py-3 px-3">
                                <span class="badge-in-stock inline-block text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $p['stock'] }}</span>
                            </td>
                            <td class="py-3 px-3">
                                <span class="{{ $p['up'] ? 'trend-up' : 'trend-down' }} text-xs font-semibold">{{ $p['trend'] }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>

<!-- ── CHART.JS ──────────────────────────────────────────── -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {

    // Sales Overview — Line
    new Chart(document.getElementById('salesChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [{
                data: [42000, 58000, 55000, 75000, 110000, 140000, 145000],
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59,130,246,0.08)',
                borderWidth: 2.5,
                pointBackgroundColor: '#3b82f6',
                pointRadius: 3,
                pointHoverRadius: 5,
                fill: true,
                tension: 0.35
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { callback: v => (v / 1000) + 'k', font: { size: 11 }, color: '#9ca3af' },
                    grid: { color: '#f3f4f6' },
                    border: { display: false }
                },
                x: {
                    ticks: { font: { size: 11 }, color: '#9ca3af' },
                    grid: { display: false }
                }
            }
        }
    });

    // Branch Performance — Bar
    new Chart(document.getElementById('branchChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Manila\nBranch', 'Quezon City\nBranch', 'Makati\nBranch', 'Cebu\nBranch'],
            datasets: [{
                data: [62000, 48000, 40000, 12000],
                backgroundColor: '#1e3a5f',
                borderRadius: 4,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { callback: v => (v / 1000) + 'k', font: { size: 11 }, color: '#9ca3af' },
                    grid: { color: '#f3f4f6' },
                    border: { display: false }
                },
                x: {
                    ticks: { font: { size: 10 }, color: '#9ca3af' },
                    grid: { display: false }
                }
            }
        }
    });
});
</script>

</body>
</html>