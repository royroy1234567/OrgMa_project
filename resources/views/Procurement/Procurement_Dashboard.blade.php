@php
    // Sample procurement dashboard data - replace with your actual database query
    $procurementSummary = [
        [
            'label' => 'Active Orders',
            'value' => '3',
            'sublabel' => 'In transit',
            'icon' => '<svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>',
            'bg_color' => 'bg-blue-50'
        ],
        [
            'label' => 'Active Supplier',
            'value' => '4',
            'sublabel' => 'Verified',
            'icon' => '<svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>',
            'bg_color' => 'bg-green-50'
        ],
        [
            'label' => 'Reorder Alert',
            'value' => '4',
            'sublabel' => 'Action Needed',
            'icon' => '<svg class="w-12 h-12 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>',
            'bg_color' => 'bg-yellow-50'
        ],
        [
            'label' => 'Budget Used',
            'value' => '21.2%',
            'sublabel' => '₱ 53,000',
            'icon' => '<svg class="w-12 h-12 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>',
            'bg_color' => 'bg-purple-50'
        ],
    ];

    $recentPurchaseOrders = [
        [
            'po_number' => 'PO-2025-001',
            'supplier' => 'Samsung',
            'amount' => 25400,
            'status' => 'Completed',
            'status_color' => 'green'
        ],
        [
            'po_number' => 'PO-2025-002',
            'supplier' => 'LG',
            'amount' => 15100,
            'status' => 'In Transit',
            'status_color' => 'blue'
        ],
        [
            'po_number' => 'PO-2025-003',
            'supplier' => 'Astron',
            'amount' => 20800,
            'status' => 'Processing',
            'status_color' => 'orange'
        ],
        [
            'po_number' => 'PO-2025-004',
            'supplier' => 'Sony',
            'amount' => 10600,
            'status' => 'Pending',
            'status_color' => 'yellow'
        ],
    ];

    $urgentReorders = [
        [
            'product' => 'TCL TV',
            'stock' => '15 units',
            'days_left' => '4 days left',
            'urgency' => 'Reorder'
        ],
        [
            'product' => 'LG Refrigerator',
            'stock' => '8 units',
            'days_left' => '3 days left',
            'urgency' => 'Reorder'
        ],
        [
            'product' => 'Astron Rice Cooker',
            'stock' => '6 units',
            'days_left' => '3 days left',
            'urgency' => 'Reorder'
        ],
        [
            'product' => 'Panasonic Washing Machine',
            'stock' => '4 units',
            'days_left' => '4 days left',
            'urgency' => 'Reorder'
        ],
    ];

    $statusColors = [
        'green' => 'text-green-600 bg-green-50',
        'blue' => 'text-blue-600 bg-blue-50',
        'orange' => 'text-orange-600 bg-orange-50',
        'yellow' => 'text-yellow-600 bg-yellow-50',
    ];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procurement Budget</title>
    @vite(['resources/css/app.css','resources/css/inventory.css' , 'resources/js/Inventory.js'])
</head>
<body class="bg-gray-100">
    {{-- Header Component (Full Width at Top) --}}
   <x-header 
    title="Procurement" 
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
            'label' => 'Dashboard',
            'url' => route('Procurement_Dashboard'),
            'active' => 'Procurement_Dashboard',
            'page' => 'Procurement_Dashboard',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z\' /></svg>'
        ],
        [
            'label' => 'Purchase Orders',
            'url' => route('Procurement_PurchaseOrder'),
            'active' => 'Procurement_PurchaseOrder',
            'page' => 'Procurement_PurchaseOrder',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
        [
            'label' => 'Suppliers',
            'url' => route('Procurement_Supplier'),
            'active' => 'Procurement_Supplier',
            'page' => 'Procurement_Supplier',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
        [
            'label' => 'Reorder Alerts',
            'url' => route('Procurement_ReordersAlert'),
            'active' => 'Procurement_ReordersAlert',
            'page' => 'Procurement_ReordersAlert',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
        [
            'label' => 'Recieving',
            'url' => route('Procurement_ReceivingHistory'),
            'active' => 'Procurement_ReceivingHistory',
            'page' => 'Procurement_ReceivingHistory',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
        [
            'label' => 'Budget',
            'url' => route('Procurement_Budget'),
            'active' => 'Procurement_Budget',
            'page' => 'Procurement_Budget',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
    ]" 
    activePage="{{ request()->route()->getName() === 'Dashboard' ? 'dashboard' : (request()->route()->getName() === 'Products' ? 'products' : 'returns') }}"
    />


    {{-- Main Content Area --}}
    <main class="flex-1 mt-16 p-6 md:ml-64 transition-all duration-300">
        {{-- Procurement Summary Section --}}
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200 mb-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Procurement Summary</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($procurementSummary as $summary)
                <div class="flex items-center gap-3 p-4 {{ $summary['bg_color'] }} rounded-lg">
                    <div class="flex-shrink-0">
                        {!! $summary['icon'] !!}
                    </div>
                    <div>
                        <p class="text-xs text-gray-600 mb-0.5">{{ $summary['label'] }}</p>
                        <p class="text-2xl font-bold text-gray-900 mb-0.5">{{ $summary['value'] }}</p>
                        <p class="text-xs text-gray-500">{{ $summary['sublabel'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Recent Purchase Orders Section --}}
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200 mb-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Recent Purchase Orders</h2>
            
            <div class="space-y-3">
                @foreach($recentPurchaseOrders as $order)
                <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-200">
                    <div>
                        <p class="text-sm font-semibold text-gray-900">{{ $order['po_number'] }}</p>
                        <p class="text-xs text-gray-500">{{ $order['supplier'] }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-gray-900 mb-1">₱{{ number_format($order['amount'], 0) }}</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $statusColors[$order['status_color']] }}">
                            {{ $order['status'] }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Urgent Reorders Section --}}
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Urgent Reorders</h2>
            
            <div class="space-y-3">
                @foreach($urgentReorders as $reorder)
                <div class="flex justify-between items-center p-4 bg-red-50 rounded-lg hover:bg-red-100 transition duration-200">
                    <div>
                        <p class="text-sm font-semibold text-gray-900">{{ $reorder['product'] }}</p>
                        <p class="text-xs text-gray-500">Stock: {{ $reorder['stock'] }}</p>
                    </div>
                    <div class="text-right flex items-center gap-2">
                        <span class="text-xs text-red-600 font-medium">{{ $reorder['days_left'] }}</span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-600 text-white">
                            {{ $reorder['urgency'] }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>

</body>
</html>