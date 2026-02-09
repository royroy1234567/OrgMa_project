<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    @vite(['resources/css/app.css', 'resources/css/inventory.css', 'resources/js/Inventory.js'])
    <style>
        .card { box-shadow: 0 1px 3px rgba(0,0,0,0.08); }

        .btn-generate {
            background: #2563eb;
            color: #fff;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.55rem 1.25rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            transition: background 0.15s;
        }
        .btn-generate:hover { background: #1d4ed8; }

        /* Report type cards — border + hover */
        .report-type-card {
            border: 1px solid #e5e7eb;
            background: #fff;
            border-radius: 0.75rem;
            padding: 1.1rem 1.25rem;
            cursor: pointer;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .report-type-card:hover {
            border-color: #93c5fd;
            box-shadow: 0 2px 8px rgba(59,130,246,0.12);
        }

        /* Recent report row separator */
        .report-row { border-bottom: 1px solid #f3f4f6; }
        .report-row:last-child { border-bottom: none; }

        /* Quick Stats row separator */
        .stat-row { border-bottom: 1px solid #f3f4f6; }
        .stat-row:last-child { border-bottom: none; }

        /* Schedule row separator */
        .schedule-row { border-bottom: 1px solid #f3f4f6; }
        .schedule-row:last-child { border-bottom: none; }
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
    activePage="reports"
    />

    {{-- ─── MAIN CONTENT ──────────────────────────────── --}}
    <main class="flex-1 mt-16 p-6 md:ml-64 transition-all duration-300">

        <!-- ── PAGE HEADING + GENERATE REPORT BUTTON ──── -->
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-lg font-semibold text-gray-800">Reports &amp; Analytics</h2>
            <button class="btn-generate">Generate Report</button>
        </div>

        <!-- ── 4 REPORT TYPE CARDS ──────────────────────── -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

            <!-- Recent Reports -->
            <div class="report-type-card">
                <p class="text-sm font-semibold text-gray-800 mb-1">Recent Reports</p>
                <p class="text-xs text-gray-400">Daily, Weekly, Monthly sales</p>
            </div>

            <!-- Inventory Report -->
            <div class="report-type-card">
                <p class="text-sm font-semibold text-gray-800 mb-1">Inventory Report</p>
                <p class="text-xs text-gray-400">Stock levels and movement</p>
            </div>

            <!-- User Activity -->
            <div class="report-type-card">
                <p class="text-sm font-semibold text-gray-800 mb-1">User Activity</p>
                <p class="text-xs text-gray-400">Staff performance metrics</p>
            </div>

            <!-- Financial Report -->
            <div class="report-type-card">
                <p class="text-sm font-semibold text-gray-800 mb-1">Financial Report</p>
                <p class="text-xs text-gray-400">Revenue and expenses</p>
            </div>
        </div>

        <!-- ── RECENT REPORTS LIST ──────────────────────── -->
        <div class="card bg-white rounded-xl p-5 mb-6">
            <h3 class="text-sm font-semibold text-gray-800 mb-4">Recent Reports</h3>

            @php
                $reports = [
                    ['title' => 'Monthly Sales Report - December 2024', 'by' => 'Generated by Admin',          'date' => 'Jan 5, 2025'],
                    ['title' => 'Inventory Audit - Manila Branch',      'by' => 'Generated by Juan Dela Cruz', 'date' => 'Jan 3, 2025'],
                    ['title' => 'Year-End Financial Summary 2024',      'by' => 'Generated by Admin',          'date' => 'Jan 1, 2025'],
                    ['title' => 'Staff Performance Report Q4 2024',     'by' => 'Generated by Maria Santos',   'date' => 'Dec 31, 2024'],
                ];
            @endphp

            @foreach ($reports as $report)
            <div class="report-row flex items-center justify-between py-3">
                <div>
                    <p class="text-sm font-medium text-gray-800">{{ $report['title'] }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $report['by'] }}</p>
                </div>
                <p class="text-xs text-gray-400 whitespace-nowrap ml-6">{{ $report['date'] }}</p>
            </div>
            @endforeach
        </div>

        <!-- ── BOTTOM ROW: Quick Stats + Report Schedule ── -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

            <!-- Quick Stats -->
            <div class="card bg-white rounded-xl p-5">
                <h3 class="text-sm font-semibold text-gray-800 mb-4">Quick Stats</h3>

                @php
                    $stats = [
                        ['label' => 'Total Revenue (2024)',    'value' => '₱45.2M'],
                        ['label' => 'Total Orders',            'value' => '3,247'],
                        ['label' => 'Average Order Value',     'value' => '₱13,920'],
                        ['label' => 'Customer Satisfaction',   'value' => '4.5/5'],
                    ];
                @endphp

                @foreach ($stats as $stat)
                <div class="stat-row flex items-center justify-between py-3">
                    <p class="text-sm text-gray-600">{{ $stat['label'] }}</p>
                    <p class="text-sm font-semibold text-gray-800">{{ $stat['value'] }}</p>
                </div>
                @endforeach
            </div>

            <!-- Report Schedule -->
            <div class="card bg-white rounded-xl p-5">
                <h3 class="text-sm font-semibold text-gray-800 mb-4">Report Schedule</h3>

                @php
                    $schedules = [
                        ['name' => 'Daily Sales Summary',       'freq' => 'Every day at 6:00 PM'],
                        ['name' => 'Weekly Inventory Check',    'freq' => 'Every Monday at 9:00 AM'],
                        ['name' => 'Monthly Financial Report',  'freq' => '1st of every month'],
                    ];
                @endphp

                @foreach ($schedules as $s)
                <div class="schedule-row flex items-center justify-between py-3">
                    <p class="text-sm font-medium text-gray-800">{{ $s['name'] }}</p>
                    <p class="text-xs text-gray-400 whitespace-nowrap ml-4">{{ $s['freq'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

    </main>
</div>

</body>
</html>