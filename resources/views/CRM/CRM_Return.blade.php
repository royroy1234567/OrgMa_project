<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Returns and Complaints</title>
    @vite(['resources/css/app.css', 'resources/css/inventory.css', 'resources/js/Inventory.js'])
    <style>
        .card { box-shadow: 0 1px 3px rgba(0,0,0,0.08); }

        /* New Case button (blue) */
        .btn-new-case {
            background: #2563eb;
            color: #fff;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.55rem 1.1rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }
        .btn-new-case:hover { background: #1d4ed8; }

        /* Filter button */
        .btn-filter {
            background: #fff;
            border: 1px solid #d1d5db;
            color: #374151;
            font-size: 0.85rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }
        .btn-filter:hover { background: #f9fafb; }

        /* Issue Type badges */
        .badge-return   { color: #ea580c; font-weight: 600; font-size: 0.8rem; }
        .badge-damage   { color: #dc2626; font-weight: 600; font-size: 0.8rem; }
        .badge-exchange { color: #2563eb; font-weight: 600; font-size: 0.8rem; }

        /* Eligible badges */
        .badge-yes { color: #16a34a; font-weight: 600; font-size: 0.8rem; }
        .badge-no  { color: #dc2626; font-weight: 600; font-size: 0.8rem; }

        /* Status badges */
        .badge-pending  { color: #ea580c; font-weight: 600; font-size: 0.8rem; }
        .badge-approved { color: #16a34a; font-weight: 600; font-size: 0.8rem; }
        .badge-rejected { color: #dc2626; font-weight: 600; font-size: 0.8rem; }

        /* View Details link (blue) */
        .link-view-details {
            color: #2563eb;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
        }
        .link-view-details:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="bg-gray-100">

{{-- ─── HEADER ─────────────────────────────────────────── --}}
<x-header 
    title="CRM" 
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
            'url' => route('CRM_Dashboard'),
            'active' => 'CRM_Dashboard',
            'page' => 'CRM_Dashboard',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-4.749zM13.749999999999998,6a3,3,0,1,1,6,0,3,3,0,0,1-6,0z\' /></svg>'
        ],
        [
            'label' => 'Returns',
            'url' => route('CRM_Return'),
            'active' => 'CRM_Return',
            'page' => 'CRM_Return',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
                [
            'label' => 'Communications',
            'url' => route('CRM_Communications'),
            'active' => 'CRM_Communications',
            'page' => 'CRM_Communications',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
                     [
            'label' => 'Analytics',
            'url' => route('CRM_Analytics'),
            'active' => 'CRM_Analytics',
            'page' => 'CRM_Analytics',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
                            [
            'label' => 'Feedbacks',
            'url' => route('CRM_Feedback'),
            'active' => 'CRM_Feedback',
            'page' => 'CRM_Feedback',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
    ]" 
    activePage="{{ request()->route()->getName() === 'Dashboard' ? 'dashboard' : (request()->route()->getName() === 'Products' ? 'products' : 'returns') }}"
    />

    {{-- ─── MAIN CONTENT ──────────────────────────────── --}}
    <main class="flex-1 mt-16 p-6 md:ml-64 transition-all duration-300">

        <!-- ── PAGE HEADING + NEW CASE BUTTON ──────────── -->
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-lg font-semibold text-gray-800">Returns and Complaints</h2>
            <button class="btn-new-case">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                New Case
            </button>
        </div>

        <!-- ── SEARCH BAR + FILTER ───────────────────────── -->
        <div class="card bg-white rounded-xl p-4 mb-4">
            <div class="flex items-center gap-3">
                <!-- Search input -->
                <div class="relative flex-1">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="M21 21l-4.35-4.35"/>
                    </svg>
                    <input type="text" placeholder="Search products..."
                           class="w-full pl-9 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-300 bg-gray-50">
                </div>

                <!-- Filter button -->
                <button class="btn-filter">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 4.5h18v2.25L13.5 12.75V19.5l-3 1.5v-8.25L3 6.75V4.5z"/>
                    </svg>
                    Filter
                </button>
            </div>
        </div>

        <!-- ── RETURNS TABLE ─────────────────────────────── -->
        <div class="card bg-white rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50">
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Case ID</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Customer</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Product</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Issue Type</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Request Date</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Eligible</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Status</th>
                            <th class="text-left py-3 px-4 text-xs text-gray-500 font-semibold uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $cases = [
                                [
                                    'case_id'      => 'RET-001',
                                    'customer'     => 'John Smith',
                                    'product'      => 'Refrigerator',
                                    'product_sub'  => 'Inverter',
                                    'issue_type'   => 'Return',
                                    'request_date' => '2025-01-10',
                                    'eligible'     => 'Yes',
                                    'status'       => 'Pending',
                                ],
                                [
                                    'case_id'      => 'RET-002',
                                    'customer'     => 'Mike Chen',
                                    'product'      => 'TV',
                                    'product_sub'  => '55 Inch',
                                    'issue_type'   => 'Damage',
                                    'request_date' => '2025-15-10',
                                    'eligible'     => 'Yes',
                                    'status'       => 'Approved',
                                ],
                                [
                                    'case_id'      => 'RET-003',
                                    'customer'     => 'Sarah Johnson',
                                    'product'      => 'Washing Machine',
                                    'product_sub'  => 'Inverter',
                                    'issue_type'   => 'Exchange',
                                    'request_date' => '2025-28-10',
                                    'eligible'     => 'No',
                                    'status'       => 'Rejected',
                                ],
                            ];
                        @endphp

                        @foreach ($cases as $case)
                        @php
                            $issueClass = match($case['issue_type']) {
                                'Return'   => 'badge-return',
                                'Damage'   => 'badge-damage',
                                'Exchange' => 'badge-exchange',
                                default    => '',
                            };
                            $eligibleClass = $case['eligible'] === 'Yes' ? 'badge-yes' : 'badge-no';
                            $statusClass = match($case['status']) {
                                'Pending'  => 'badge-pending',
                                'Approved' => 'badge-approved',
                                'Rejected' => 'badge-rejected',
                                default    => '',
                            };
                        @endphp
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="py-3.5 px-4 font-medium text-gray-800">{{ $case['case_id'] }}</td>
                            <td class="py-3.5 px-4 text-gray-700">{{ $case['customer'] }}</td>
                            <td class="py-3.5 px-4">
                                <p class="font-medium text-gray-800">{{ $case['product'] }}</p>
                                <p class="text-xs text-gray-400">{{ $case['product_sub'] }}</p>
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="{{ $issueClass }}">{{ $case['issue_type'] }}</span>
                            </td>
                            <td class="py-3.5 px-4 text-gray-600">{{ $case['request_date'] }}</td>
                            <td class="py-3.5 px-4">
                                <span class="{{ $eligibleClass }}">{{ $case['eligible'] }}</span>
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="{{ $statusClass }}">{{ $case['status'] }}</span>
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