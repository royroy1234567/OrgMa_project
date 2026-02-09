@php
    // Sample procurement data - replace with your actual database query
    $procurementSummary = [
        [
            'label' => 'Allocated Budget',
            'amount' => 250000,
            'currency' => '₱',
            'icon' => '<svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2"/></svg>',
            'bg_color' => 'bg-blue-50'
        ],
        [
            'label' => 'Remaining',
            'amount' => 197000,
            'currency' => '₱',
            'icon' => '<svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
            'bg_color' => 'bg-green-50'
        ],
        [
            'label' => 'Spent',
            'amount' => 53000,
            'currency' => '₱',
            'icon' => '<svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>',
            'bg_color' => 'bg-purple-50'
        ],
    ];

    $monthlySpending = [
        ['month' => 'January 2025', 'amount' => 18500],
        ['month' => 'February 2025', 'amount' => 18500],
        ['month' => 'March 2025', 'amount' => 16000],
        ['month' => 'April 2025', 'amount' => 0],
    ];

    // Calculate budget utilization percentage
    $allocatedBudget = 250000;
    $spent = 53000;
    $budgetUtilization = ($spent / $allocatedBudget) * 100;
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
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($procurementSummary as $summary)
                <div class="flex items-center gap-4 p-4 {{ $summary['bg_color'] }} rounded-lg">
                    <div class="flex-shrink-0">
                        {!! $summary['icon'] !!}
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">{{ $summary['label'] }}</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $summary['currency'] }} {{ number_format($summary['amount'], 0) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Budget Utilization Section --}}
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-800">Budget Utilization</h2>
                <span class="text-sm font-semibold text-gray-700">{{ number_format($budgetUtilization, 1) }}%</span>
            </div>
            
            {{-- Progress Bar --}}
            <div class="w-full bg-gray-200 rounded-full h-3">
                <div class="bg-blue-600 h-3 rounded-full transition-all duration-500" style="width: {{ $budgetUtilization }}%"></div>
            </div>
        </div>

        {{-- Monthly Spending Section --}}
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Monthly Spending</h2>
            
            <div class="space-y-3">
                @foreach($monthlySpending as $spending)
                <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-200">
                    <span class="text-sm font-medium text-gray-700">{{ $spending['month'] }}</span>
                    <span class="text-sm font-bold text-gray-900">₱{{ number_format($spending['amount'], 0) }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>

</body>
</html>