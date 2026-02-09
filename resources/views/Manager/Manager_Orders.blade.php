<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Branch')</title>
    @vite(['resources/css/app.css','resources/css/inventory.css' , 'resources/js/Inventory.js'])
</head>
<body class="bg-gray-100">
    {{-- Header Component (Full Width at Top) --}}
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
{{-- Flex Container for Sidebar and Main Content --}}
<div class="flex">
    {{-- Sidebar Component --}}
    <x-sidebar :items="$sidebarItems ?? [
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
    activePage="{{ request()->route()->getName() === 'Dashboard' ? 'dashboard' : (request()->route()->getName() === 'Products' ? 'products' : 'returns') }}"
    />
    {{-- Main Content Area --}}
    <main class="flex-1 mt-16 p-6 md:ml-64  transition-all duration-300">

        {{-- =============== ORDERS MANAGEMENT UI =============== --}}

        @php
            $orders = [
                ['id'=>'ORD-2026-004','date'=>'01/13/2026, 11:04 AM','customer'=>'Danione D. Diego','phone'=>'+63 987 654 3210','total'=>100995.00,'items'=>1,'payment'=>'Cash on Delivery','status'=>'Completed'],
                ['id'=>'ORD-2026-001','date'=>'01/14/2026, 11:04 AM','customer'=>'Maria Santos','phone'=>'+63 912 345 6789','total'=>498.77,'items'=>1,'payment'=>'Cash on Delivery','status'=>'Pending'],
                ['id'=>'ORD-2026-002','date'=>'01/14/2026, 11:04 AM','customer'=>'Juan Dela Cruz','phone'=>'+63 917 889 9999','total'=>6460.00,'items'=>1,'payment'=>'Credit Card','status'=>'Processing'],
                ['id'=>'ORD-2026-003','date'=>'01/12/2026, 11:04 AM','customer'=>'Ana Reyes','phone'=>'+63 905 123 4567','total'=>67498.00,'items'=>1,'payment'=>'Paid','status'=>'Shipped'],
            ];

            $counts = ['All'=>count($orders),'Pending'=>0,'Processing'=>0,'Shipped'=>0,'Completed'=>0];
            foreach ($orders as $o) { $counts[$o['status']]++; }
        @endphp

        <!-- Title -->
        <h1 style="font-size:1.5rem; font-weight:700; color:#1f2937; margin-bottom:1.25rem;">
            Orders Management
        </h1>

        <!-- Status Filter Tabs -->
        <div style="display:flex; flex-wrap:wrap; gap:0.5rem; margin-bottom:1.5rem;">
            @foreach (['All','Pending','Processing','Shipped','Completed'] as $tab)
                <button
                    class="order-tab"
                    data-tab="{{ $tab }}"
                    onclick="orderTabClick(this)"
                    style="padding:0.4rem 0.9rem; border-radius:0.375rem; font-size:0.8125rem; font-weight:500; cursor:pointer; border:1px solid #d1d5db; background:#fff; color:#374151; transition:background 0.15s, color 0.15s, border-color 0.15s; {{ $tab === 'All' ? 'background:#2563eb !important; color:#fff !important; border-color:#2563eb !important;' : '' }}"
                >
                    {{ $tab }} ({{ $counts[$tab] }})
                </button>
            @endforeach
        </div>

        <!-- Table Card -->
        <div style="background:#fff; border-radius:0.75rem; box-shadow:0 1px 3px rgba(0,0,0,0.08); border:1px solid #e5e7eb; overflow:hidden;">
            <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse; text-align:left;">

                    <!-- THEAD -->
                    <thead>
                        <tr style="background:#f9fafb; border-bottom:1px solid #e5e7eb;">
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Order ID</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Customer</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Total</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Payment</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Status</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Action</th>
                        </tr>
                    </thead>

                    <!-- TBODY -->
                    <tbody id="orderTableBody">
                        @foreach ($orders as $o)
                        <tr class="order-row"
                            data-status="{{ strtolower($o['status']) }}"
                            style="border-bottom:1px solid #f3f4f6; transition:background 0.15s;"
                            onmouseover="this.style.background='#f0f4ff';"
                            onmouseout="this.style.background='transparent';"
                        >
                            <!-- Order ID + Date -->
                            <td style="padding:0.875rem 1.25rem;">
                                <div style="font-size:0.875rem; font-weight:600; color:#1f2937;">{{ $o['id'] }}</div>
                                <div style="font-size:0.72rem; color:#9ca3af; margin-top:2px;">{{ $o['date'] }}</div>
                            </td>

                            <!-- Customer + Phone -->
                            <td style="padding:0.875rem 1.25rem;">
                                <div style="font-size:0.875rem; font-weight:600; color:#1f2937;">{{ $o['customer'] }}</div>
                                <div style="font-size:0.72rem; color:#9ca3af; margin-top:2px;">{{ $o['phone'] }}</div>
                            </td>

                            <!-- Total + items -->
                            <td style="padding:0.875rem 1.25rem;">
                                <div style="font-size:0.875rem; font-weight:600; color:#1f2937;">₱{{ number_format($o['total'], 2) }}</div>
                                <div style="font-size:0.72rem; color:#9ca3af; margin-top:2px;">{{ $o['items'] }} item{{ $o['items'] > 1 ? 's' : '' }}</div>
                            </td>

                            <!-- Payment -->
                            <td style="padding:0.875rem 1.25rem; font-size:0.875rem; color:#374151;">
                                {{ $o['payment'] }}
                            </td>

                            <!-- Status (colored text, no pill) -->
                            <td style="padding:0.875rem 1.25rem;">
                                @if ($o['status'] === 'Completed')
                                    <span style="font-size:0.8125rem; font-weight:600; color:#16a34a;">Completed</span>
                                @elseif ($o['status'] === 'Pending')
                                    <span style="font-size:0.8125rem; font-weight:600; color:#ea580c;">Pending</span>
                                @elseif ($o['status'] === 'Processing')
                                    <span style="font-size:0.8125rem; font-weight:600; color:#2563eb;">Processing</span>
                                @elseif ($o['status'] === 'Shipped')
                                    <span style="font-size:0.8125rem; font-weight:600; color:#9333ea;">Shipped</span>
                                @endif
                            </td>

                            <!-- Action -->
                            <td style="padding:0.875rem 1.25rem;">
                                <a href="#"
                                   style="color:#2563eb; font-size:0.8125rem; font-weight:500; text-decoration:none; white-space:nowrap;"
                                   onmouseover="this.style.color='#1d4ed8'; this.style.textDecoration='underline';"
                                   onmouseout="this.style.color='#2563eb'; this.style.textDecoration='none';"
                                >View Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Empty State -->
                <div id="orderEmptyState" style="display:none; text-align:center; padding:3rem 1rem; color:#6b7280; font-size:0.875rem;">
                    No orders found for this status.
                </div>
            </div>
        </div>

        {{-- =============== END ORDERS MANAGEMENT =============== --}}
    </main>
</div>

</body>
</html>

<!-- =============== JS: Tab Filter =============== -->
<script>
    function orderTabClick(btn) {
        // Reset all tabs -> white
        document.querySelectorAll('.order-tab').forEach(function (t) {
            t.style.background  = '#fff';
            t.style.color       = '#374151';
            t.style.borderColor = '#d1d5db';
        });

        // Active tab -> blue
        btn.style.background  = '#2563eb';
        btn.style.color       = '#fff';
        btn.style.borderColor = '#2563eb';

        var selected = btn.dataset.tab.toLowerCase();
        var rows     = document.querySelectorAll('#orderTableBody tr.order-row');
        var visible  = 0;

        rows.forEach(function (row) {
            if (selected === 'all' || row.dataset.status === selected) {
                row.style.display = '';
                visible++;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('orderEmptyState').style.display = (visible === 0) ? 'block' : 'none';
    }
</script>