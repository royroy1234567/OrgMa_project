<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Access')</title>
    @vite(['resources/css/app.css','resources/css/inventory.css' , 'resources/js/Inventory.js'])
</head>
<body class="bg-gray-100">
    {{-- Header Component (Full Width at Top) --}}
   <x-header 
    title="Admin" 
    searchPlaceholder="Search users, reports, or logs..."
>
    <x-slot name="icon">
        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 3l7 4v5c0 5-3.5 9-7 9s-7-4-7-9V7l7-4z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4" />
        </svg>
    </x-slot>
</x-header>
{{-- Flex Container for Sidebar and Main Content --}}
<div class="flex">
    {{-- Sidebar Component --}}
    <x-sidebar :items="$sidebarItems ?? [
        [   
            'label' => 'Dashboard',
            'url' => route('Admin_Dashboard'),
            'active' => 'Admin_Dashboard',
            'page' => 'Admin_Dashboard',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M3 12l9-9 9 9M4.5 10.5V21h6v-6h3v6h6V10.5\' /></svg>'
        ],
        [
            'label' => 'Users',
            'url' => route('Admin_Users'),
            'active' => 'Admin_Users',
            'page' => 'Admin_Users',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M15 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M12 7a4 4 0 11-8 0 4 4 0 018 0zm6 8h.01\' /></svg>'
        ],
        [
            'label' => 'Roles',
            'url' => route('Admin_Roles'),
            'active' => 'Admin_Roles',
            'page' => 'Admin_Roles',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M9 12l2 2 4-4M12 22a10 10 0 100-20 10 10 0 000 20z\' /></svg>'
        ],
        [
            'label' => 'Branch',
            'url' => route('Admin_Branch'),
            'active' => 'Admin_Branch',
            'page' => 'Admin_Branch',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6\' /></svg>'
        ],
        [
            'label' => 'Access',
            'url' => route('Admin_Access'),
            'active' => 'Admin_Access',
            'page' => 'Admin_Access',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm6-10V7a4 4 0 10-8 0v4\' /></svg>'
        ],
        [
            'label' => 'Inventory',
            'url' => route('Admin_Inventory'),
            'active' => 'Admin_Inventory',
            'page' => 'Admin_Inventory',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4-8-4\' /></svg>'
        ],
        [
            'label' => 'Reports',
            'url' => route('Admin_Reports'),
            'active' => 'Admin_Reports',
            'page' => 'Admin_Reports',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M3 3v18h18M9 17V9m4 8V5m4 12v-4\' /></svg>'
        ],
        [
            'label' => 'Security',
            'url' => route('Admin_Security'),
            'active' => 'Admin_Security',
            'page' => 'Admin_Security',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M12 3l7 4v5c0 5-3.5 9-7 9s-7-4-7-9V7l7-4z\' /></svg>'
        ],
        [
            'label' => 'Logs',
            'url' => route('Admin_Logs'),
            'active' => 'Admin_Logs',
            'page' => 'Admin_Logs',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M9 12h6m-6 4h6m-6-8h6M5 4h14v16H5z\' /></svg>'
        ],
        [
            'label' => 'Settings',
            'url' => route('Admin_Settings'),
            'active' => 'Admin_Settings',
            'page' => 'Admin_Settings',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M11.25 3.75h1.5l.375 2.25a6.97 6.97 0 012.073.86l1.92-1.11 1.06 1.06-1.11 1.92c.39.65.67 1.35.86 2.07l2.25.38v1.5l-2.25.38a6.97 6.97 0 01-.86 2.07l1.11 1.92-1.06 1.06-1.92-1.11a6.97 6.97 0 01-2.07.86l-.38 2.25h-1.5l-.38-2.25a6.97 6.97 0 01-2.07-.86l-1.92 1.11-1.06-1.06 1.11-1.92a6.97 6.97 0 01-.86-2.07L3.75 12v-1.5l2.25-.38c.19-.72.47-1.42.86-2.07L5.76 6.13l1.06-1.06 1.92 1.11c.65-.39 1.35-.67 2.07-.86l.44-2.25zM12 15a3 3 0 100-6 3 3 0 000 6z\' /></svg>'
        ],
    ]" 
    activePage="{{ request()->route()->getName() === 'Dashboard' ? 'dashboard' : (request()->route()->getName() === 'Products' ? 'products' : 'returns') }}"
    />
    {{-- Main Content Area --}}
    <main class="flex-1 mt-16 p-6 md:ml-64  transition-all duration-300">

        {{-- =============== BRANCH MANAGEMENT UI =============== --}}

        @php
            $branches = [
                ['name'=>'Manila Branch','address'=>'123 Rizal Ave, Manila','manager'=>'Juan Dela Cruz','staff'=>10,'sales'=>52340,'status'=>'Active'],
                ['name'=>'Quezon City Branch','address'=>'456 Commonwealth Ave, QC','manager'=>'Victor Isidro','staff'=>10,'sales'=>44120,'status'=>'Active'],
                ['name'=>'Makati Branch','address'=>'789 Ayala Ave, Makati','manager'=>'Marco San Jose','staff'=>8,'sales'=>38770,'status'=>'Active'],
            ];

            $performance = [
                ['branch'=>'Manila','monthly_sales'=>'₱1.2M','inventory'=>'₱3.5M','staff'=>12],
                ['branch'=>'Quezon City','monthly_sales'=>'₱980K','inventory'=>'₱2.8M','staff'=>10],
                ['branch'=>'Makati','monthly_sales'=>'₱850K','inventory'=>'₱2.2M','staff'=>8],
            ];
        @endphp

        <!-- Title + Add New Branch Button -->
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem;">
            <h1 style="font-size:1.5rem; font-weight:700; color:#1f2937;">Branch Management</h1>
            <button
                style="padding:0.6rem 1.25rem; background:#2563eb; color:#fff; border:none; border-radius:0.5rem; font-size:0.875rem; font-weight:500; cursor:pointer; box-shadow:0 1px 3px rgba(0,0,0,0.1); transition:background 0.15s;"
                onmouseover="this.style.background='#1d4ed8';"
                onmouseout="this.style.background='#2563eb';"
            >
                Add New Branch
            </button>
        </div>

        <!-- Branch Cards (3-column grid) -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:1rem; margin-bottom:2rem;">

            @foreach ($branches as $b)
            <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; padding:1.25rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                
                <!-- Header: Branch Name + Active Badge -->
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:0.75rem;">
                    <h2 style="font-size:1.0625rem; font-weight:700; color:#1f2937;">{{ $b['name'] }}</h2>
                    <span style="padding:0.2rem 0.65rem; background:#dcfce7; color:#16a34a; font-size:0.75rem; font-weight:600; border-radius:0.75rem;">{{ $b['status'] }}</span>
                </div>

                <!-- Address -->
                <p style="font-size:0.8125rem; color:#6b7280; margin-bottom:0.5rem;">{{ $b['address'] }}</p>

                <!-- Manager -->
                <p style="font-size:0.8125rem; color:#374151; margin-bottom:0.2rem;">
                    <span style="font-weight:500;">Manager:</span> {{ $b['manager'] }}
                </p>

                <!-- Staff -->
                <p style="font-size:0.8125rem; color:#374151; margin-bottom:0.75rem;">
                    <span style="font-weight:500;">Staff:</span> {{ $b['staff'] }}
                </p>

                <!-- Today's Sales (blue text) -->
                <p style="font-size:0.875rem; font-weight:600; color:#2563eb; margin-bottom:1rem;">
                    Today's Sales: ₱{{ number_format($b['sales'], 0) }}
                </p>

                <!-- View Details Button -->
                <button
                    style="width:100%; padding:0.5rem; background:#f3f4f6; color:#6b7280; border:1px solid #d1d5db; border-radius:0.5rem; font-size:0.875rem; font-weight:500; cursor:pointer; transition:background 0.15s, border-color 0.15s;"
                    onmouseover="this.style.background='#e5e7eb'; this.style.borderColor='#9ca3af';"
                    onmouseout="this.style.background='#f3f4f6'; this.style.borderColor='#d1d5db';"
                >
                    View Details
                </button>

            </div>
            @endforeach

        </div>

        <!-- Branch Performance Comparison Section -->
        <h2 style="font-size:1.125rem; font-weight:700; color:#1f2937; margin-bottom:0.75rem;">Branch Performance Comparison</h2>

        <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; overflow:hidden; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
            <table style="width:100%; border-collapse:collapse; text-align:left;">
                <!-- THEAD (light blue background) -->
                <thead>
                    <tr style="background:#dbeafe; border-bottom:1px solid #bfdbfe;">
                        <th style="padding:0.75rem 1.25rem; font-size:0.875rem; font-weight:600; color:#1f2937;">Branch</th>
                        <th style="padding:0.75rem 1.25rem; font-size:0.875rem; font-weight:600; color:#1f2937;">Monthly Sales</th>
                        <th style="padding:0.75rem 1.25rem; font-size:0.875rem; font-weight:600; color:#1f2937;">Inventory Value</th>
                        <th style="padding:0.75rem 1.25rem; font-size:0.875rem; font-weight:600; color:#1f2937;">Staff Count</th>
                    </tr>
                </thead>
                <!-- TBODY -->
                <tbody>
                    @foreach ($performance as $p)
                    <tr style="border-bottom:1px solid #f3f4f6;">
                        <td style="padding:0.75rem 1.25rem; font-size:0.875rem; color:#374151;">{{ $p['branch'] }}</td>
                        <td style="padding:0.75rem 1.25rem; font-size:0.875rem; color:#374151;">{{ $p['monthly_sales'] }}</td>
                        <td style="padding:0.75rem 1.25rem; font-size:0.875rem; color:#374151;">{{ $p['inventory'] }}</td>
                        <td style="padding:0.75rem 1.25rem; font-size:0.875rem; color:#374151;">{{ $p['staff'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- =============== END BRANCH MANAGEMENT =============== --}}
    </main>
</div>

</body>
</html>