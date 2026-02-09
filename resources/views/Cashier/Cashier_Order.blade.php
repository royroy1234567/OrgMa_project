@php
    // Sample orders data - replace with your actual database query
    $orders = [
        [
            'order_id' => 'ORD-2026-004',
            'date' => '07/12/2026 11:04 AM',
            'customer' => 'Danione D. Diego',
            'customer_id' => '14 587 884 2876',
            'total' => 100995.00,
            'items' => 3,
            'payment' => 'Cash on Delivery',
            'status' => 'Completed',
            'status_color' => 'green'
        ],
        [
            'order_id' => 'ORD-2026-001',
            'date' => '07/12/2026 11:04 AM',
            'customer' => 'Maria Santos',
            'customer_id' => '15 123 456 7890',
            'total' => 498.77,
            'items' => 1,
            'payment' => 'Cash on Delivery',
            'status' => 'Pending',
            'status_color' => 'orange'
        ],
        [
            'order_id' => 'ORD-2026-002',
            'date' => '07/12/2026 11:04 AM',
            'customer' => 'Juan Dela Cruz',
            'customer_id' => '16 234 567 8901',
            'total' => 6460.00,
            'items' => 2,
            'payment' => 'Credit Card',
            'status' => 'Processing',
            'status_color' => 'blue'
        ],
        [
            'order_id' => 'ORD-2026-003',
            'date' => '07/12/2026 11:04 AM',
            'customer' => 'Ana Reyes',
            'customer_id' => '17 345 678 9012',
            'total' => 67498.00,
            'items' => 5,
            'payment' => 'Paid',
            'status' => 'Shipped',
            'status_color' => 'purple'
        ],
    ];

    $tabs = [
        ['name' => 'All', 'count' => 4],
        ['name' => 'Pending', 'count' => 1],
        ['name' => 'Processing', 'count' => 1],
        ['name' => 'Shipped', 'count' => 1],
        ['name' => 'Completed', 'count' => 1],
    ];

    $statusColors = [
        'green' => 'text-green-600 bg-green-50',
        'orange' => 'text-orange-600 bg-orange-50',
        'blue' => 'text-blue-600 bg-blue-50',
        'purple' => 'text-purple-600 bg-purple-50',
    ];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sale</title>
    @vite(['resources/css/app.css','resources/css/inventory.css' , 'resources/js/Inventory.js'])
</head>
<body class="bg-gray-100">
    {{-- Header Component (Full Width at Top) --}}
   <x-header 
    title="Cashier" 
    searchPlaceholder="Search users, reports, or logs..."
>
    <x-slot name="icon">
        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
        </svg>
    </x-slot>
</x-header>

{{-- Flex Container for Sidebar and Main Content --}}
<div class="flex">
    {{-- Sidebar Component --}}
    <x-sidebar :items="$sidebarItems ?? [
        [
            'label' => 'POS',
            'url' => route('Cashier_Pointsale'),
            'active' => 'Cashier_Pointsale',
            'page' => 'Cashier_Pointsale',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z\' /></svg>'
        ],
        [
            'label' => 'Orders',
            'url' => route('Cashier_Order'),
            'active' => 'Cashier_Order',
            'page' => 'Cashier_Order',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
    ]" 
    activePage="{{ request()->route()->getName() === 'Dashboard' ? 'dashboard' : (request()->route()->getName() === 'Products' ? 'products' : 'returns') }}"
    />

    {{-- Main Content Area --}}
    <main class="flex-1 mt-16 p-6 md:ml-64 transition-all duration-300">
        {{-- Page Header --}}
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Orders Management</h1>

        {{-- Orders Card --}}
        <div class="bg-white rounded-xl shadow-md border border-gray-200">
            {{-- Tabs --}}
            <div class="flex gap-2 p-4 border-b border-gray-200 overflow-x-auto">
                @foreach($tabs as $index => $tab)
                <button class="px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap transition duration-200 {{ $index === 0 ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    {{ $tab['name'] }} ({{ $tab['count'] }})
                </button>
                @endforeach
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="text-left py-4 px-6 text-xs font-semibold text-gray-600 uppercase tracking-wider">Order ID</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold text-gray-600 uppercase tracking-wider">Customer</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold text-gray-600 uppercase tracking-wider">Total</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold text-gray-600 uppercase tracking-wider">Payment</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold text-gray-600 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition duration-150">
                            <td class="py-4 px-6">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ $order['order_id'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $order['date'] }}</p>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ $order['customer'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $order['customer_id'] }}</p>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div>
                                    <p class="text-sm font-bold text-gray-900">₱{{ number_format($order['total'], 2) }}</p>
                                    <p class="text-xs text-gray-500">{{ $order['items'] }} items</p>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-sm text-gray-700">{{ $order['payment'] }}</p>
                            </td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $statusColors[$order['status_color']] }}">
                                    {{ $order['status'] }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    View Details
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

</body>
</html>