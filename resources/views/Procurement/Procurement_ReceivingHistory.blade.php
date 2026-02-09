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

    {{-- ─── MAIN CONTENT ──────────────────────────────── --}}
    <main class="flex-1 mt-16 p-6 md:ml-64 transition-all duration-300">

        <!-- ── PAGE HEADING ──────────────────────────────── -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-800">Receiving History</h2>
        </div>

        <!-- ── RECEIVING TABLE ───────────────────────────── -->
        <div class="card bg-white rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50">
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Receipt ID</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">PO Number</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Date Receive</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Items</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Receive By</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Quality Check</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $receipts = [
                                [
                                    'receipt_id'    => 'RCV-001',
                                    'po_number'     => 'PO-2025-001',
                                    'date_receive'  => '2025-11-01',
                                    'items'         => 5,
                                    'receive_by'    => 'Maria Santos',
                                    'quality_check' => 'Passed',
                                    'status'        => 'passed',
                                ],
                                [
                                    'receipt_id'    => 'RCV-002',
                                    'po_number'     => 'PO-2025-005',
                                    'date_receive'  => '2025-010-01',
                                    'items'         => 6,
                                    'receive_by'    => 'Juan Reyes',
                                    'quality_check' => 'Damaged',
                                    'status'        => 'damaged',
                                ],
                            ];
                        @endphp

                        @foreach ($receipts as $r)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="py-3.5 px-4 font-medium text-gray-800">{{ $r['receipt_id'] }}</td>
                            <td class="py-3.5 px-4 text-gray-700">{{ $r['po_number'] }}</td>
                            <td class="py-3.5 px-4 text-gray-700">{{ $r['date_receive'] }}</td>
                            <td class="py-3.5 px-4 text-gray-700">{{ $r['items'] }}</td>
                            <td class="py-3.5 px-4 text-gray-700">{{ $r['receive_by'] }}</td>
                            <td class="py-3.5 px-4">
                                <span class="{{ $r['status'] === 'passed' ? 'badge-passed' : 'badge-damaged' }}">
                                    {{ $r['quality_check'] }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4">
                                <a href="#" class="link-view-details">View Details</a>
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