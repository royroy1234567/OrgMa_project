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

        {{-- =============== SYSTEM LOGS UI =============== --}}

        @php
            $metrics = [
                ['label'=>'Total Events Today','value'=>'1,247','change'=>'+156','icon'=>'calendar'],
                ['label'=>'Errors','value'=>'12','change'=>'-3','icon'=>'alert'],
                ['label'=>'Critical Events','value'=>'2','change'=>'0','icon'=>'warning'],
            ];

            $logs = [
                ['timestamp'=>'2025-01-13 14:23:15','type'=>'INFO','user'=>'juan@fc.com','message'=>'User logged in successfully (192.168.1.100)'],
                ['timestamp'=>'2025-01-13 14:20:42','type'=>'UPDATE','user'=>'maria@fc.com','message'=>'Updated inventory: Samsung Ref RT-38 (Qty: +10) (192.168.1.105)'],
                ['timestamp'=>'2025-01-13 14:18:33','type'=>'ERROR','user'=>'system','message'=>'Database connection timeout (retry successful) (localhost)'],
                ['timestamp'=>'2025-01-13 14:15:20','type'=>'DELETE','user'=>'admin@fc.com','message'=>'Deleted user: test@fc.com (192.168.1.1)'],
                ['timestamp'=>'2025-01-13 14:12:08','type'=>'CREATE','user'=>'pedro@fc.com','message'=>'Created new order #1047 (192.168.1.110)'],
            ];
        @endphp

        <!-- Title -->
        <h1 style="font-size:1.5rem; font-weight:700; color:#1f2937; margin-bottom:1.25rem;">
            System Logs
        </h1>

        <!-- Metric Cards Row -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:1rem; margin-bottom:1.5rem;">
            @foreach ($metrics as $m)
            <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; padding:1.25rem; box-shadow:0 1px 3px rgba(0,0,0,0.06); display:flex; align-items:center; justify-content:space-between;">
                <div>
                    <div style="font-size:0.8125rem; color:#6b7280; margin-bottom:0.35rem;">{{ $m['label'] }}</div>
                    <div style="font-size:2rem; font-weight:700; color:#1f2937; margin-bottom:0.25rem;">{{ $m['value'] }}</div>
                    <div style="font-size:0.875rem; font-weight:600; color:{{ str_starts_with($m['change'], '+') ? '#16a34a' : (str_starts_with($m['change'], '-') ? '#dc2626' : '#6b7280') }};">
                        {{ $m['change'] }}
                    </div>
                </div>
                <!-- Icon placeholder -->
                <div style="width:3.5rem; height:3.5rem; background:#dbeafe; border-radius:0.5rem; display:flex; align-items:center; justify-content:center;">
                    <svg style="width:2rem; height:2rem; color:#2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @if ($m['icon'] === 'calendar')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        @elseif ($m['icon'] === 'alert')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        @endif
                    </svg>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Log Viewer Panel -->
        <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; padding:1.25rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
            
            <!-- Controls Row: Search + Type Dropdown + Date Picker -->
            <div style="display:grid; grid-template-columns:1fr auto auto; gap:0.75rem; margin-bottom:1.25rem;">
                
                <!-- Search Input -->
                <div style="position:relative;">
                    <svg style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); width:1rem; height:1rem; color:#9ca3af; pointer-events:none;"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input
                        type="text"
                        placeholder="Search logs..."
                        style="width:100%; box-sizing:border-box; padding:0.6rem 1rem 0.6rem 2.5rem; background:#f9fafb; border:1px solid #d1d5db; border-radius:0.5rem; font-size:0.875rem; color:#374151; outline:none;"
                    >
                </div>

                <!-- Type Dropdown -->
                <select style="padding:0.6rem 2rem 0.6rem 1rem; background:#f9fafb url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3E%3Cpath stroke=%27%236b7280%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%271.5%27 d=%27M6 8l4 4 4-4%27/%3E%3C/svg%3E') no-repeat right 0.5rem center / 1.25rem; border:1px solid #d1d5db; border-radius:0.5rem; font-size:0.875rem; color:#374151; appearance:none; cursor:pointer;">
                    <option>All Types</option>
                    <option>INFO</option>
                    <option>UPDATE</option>
                    <option>ERROR</option>
                    <option>DELETE</option>
                    <option>CREATE</option>
                </select>

                <!-- Date Picker -->
                <input
                    type="date"
                    placeholder="mm/dd/yyyy"
                    style="padding:0.6rem 1rem; background:#f9fafb; border:1px solid #d1d5db; border-radius:0.5rem; font-size:0.875rem; color:#374151; cursor:pointer;"
                >
            </div>

            <!-- Log Entries -->
            <div style="display:flex; flex-direction:column; gap:0.5rem;">
                @foreach ($logs as $log)
                    @php
                        $typeColors = [
                            'INFO' => '#2563eb',
                            'UPDATE' => '#16a34a',
                            'ERROR' => '#dc2626',
                            'DELETE' => '#ea580c',
                            'CREATE' => '#9333ea',
                        ];
                        $color = $typeColors[$log['type']] ?? '#6b7280';
                    @endphp
                    <div style="padding:0.75rem 1rem; background:#f9fafb; border-left:3px solid {{ $color }}; border-radius:0.375rem; font-size:0.875rem; color:#374151; line-height:1.5;">
                        <span style="color:#9ca3af;">[{{ $log['timestamp'] }}]</span>
                        <span style="font-weight:700; color:{{ $color }};">{{ $log['type'] }}</span>
                        <span style="color:#374151;">{{ $log['user'] }}</span> - {{ $log['message'] }}
                    </div>
                @endforeach
            </div>

        </div>

        {{-- =============== END SYSTEM LOGS =============== --}}
    </main>
</div>

</body>
</html>