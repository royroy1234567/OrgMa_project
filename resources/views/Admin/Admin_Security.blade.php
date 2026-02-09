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

        {{-- =============== SECURITY MANAGEMENT UI =============== --}}

        @php
            $metrics = [
                ['label'=>'Failed Login Attempts','value'=>12,'color'=>'#fef9c3','borderColor'=>'#fde047','textColor'=>'#ca8a04'],
                ['label'=>'Suspicious Activities','value'=>3,'color'=>'#fee2e2','borderColor'=>'#fca5a5','textColor'=>'#dc2626'],
                ['label'=>'Security Updates','value'=>1,'color'=>'#dbeafe','borderColor'=>'#93c5fd','textColor'=>'#2563eb'],
            ];

            $logs = [
                ['message'=>'Multiple failed login attempts from IP 203.123.45.67','time'=>'1 hour ago','type'=>'warning'],
                ['message'=>'Multiple failed login attempts from IP 203.123.45.67','time'=>'1 hour ago','type'=>'danger'],
                ['message'=>'Multiple failed login attempts from IP 203.123.45.67','time'=>'1 hour ago','type'=>'info'],
            ];

            $settings = [
                ['label'=>'Password Policy','value'=>'Strong (8+ chars, special chars)'],
                ['label'=>'Session Timeout','value'=>'30 minutes'],
                ['label'=>'2FA Requirement','value'=>'Enabled for Admins'],
                ['label'=>'IP Restrictions','value'=>'12 whitelisted IPs'],
            ];

            $backups = [
                ['label'=>'Database','time'=>'2 hours ago','status'=>'Success'],
                ['label'=>'User Data','time'=>'1 day ago','status'=>'Success'],
                ['label'=>'Images & Files','time'=>'2 days ago','status'=>'Pending'],
            ];
        @endphp

        <!-- Title -->
        <h1 style="font-size:1.5rem; font-weight:700; color:#1f2937; margin-bottom:1.25rem;">
            Security Management
        </h1>

        <!-- Metric Cards Row -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:1rem; margin-bottom:1.5rem;">
            @foreach ($metrics as $m)
            <div style="background:{{ $m['color'] }}; border:2px solid {{ $m['borderColor'] }}; border-radius:0.75rem; padding:1.25rem;">
                <div style="font-size:0.8125rem; color:#6b7280; margin-bottom:0.5rem;">{{ $m['label'] }}</div>
                <div style="font-size:3rem; font-weight:700; color:{{ $m['textColor'] }};">{{ $m['value'] }}</div>
            </div>
            @endforeach
        </div>

        <!-- Security Logs Section -->
        <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; padding:1.25rem; margin-bottom:1rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
            <h2 style="font-size:1.0625rem; font-weight:700; color:#1f2937; margin-bottom:0.875rem;">Security Settings</h2>

            @foreach ($logs as $log)
                @php
                    if ($log['type'] === 'warning') {
                        $bgColor = '#fef9c3';
                    } elseif ($log['type'] === 'danger') {
                        $bgColor = '#fee2e2';
                    } else {
                        $bgColor = '#dbeafe';
                    }
                @endphp
                <div style="background:{{ $bgColor }}; border-radius:0.5rem; padding:0.875rem 1rem; margin-bottom:0.5rem; display:flex; align-items:center; justify-content:space-between;">
                    <div style="font-size:0.8125rem; color:#374151;">{{ $log['message'] }}</div>
                    <div style="font-size:0.75rem; color:#9ca3af; white-space:nowrap; margin-left:1rem;">{{ $log['time'] }}</div>
                </div>
            @endforeach
        </div>

        <!-- Two-Column Section: Security Settings + Backup Status -->
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">

            <!-- Security Settings -->
            <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; padding:1.25rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                <h2 style="font-size:1.0625rem; font-weight:700; color:#1f2937; margin-bottom:1rem;">Security Settings</h2>

                @foreach ($settings as $idx => $set)
                <div style="display:flex; align-items:center; justify-content:space-between; padding:0.625rem 0; {{ $idx > 0 ? 'border-top:1px solid #f3f4f6;' : '' }}">
                    <div style="font-size:0.8125rem; color:#6b7280;">{{ $set['label'] }}</div>
                    <div style="font-size:0.8125rem; font-weight:500; color:#1f2937; text-align:right;">{{ $set['value'] }}</div>
                </div>
                @endforeach
            </div>

            <!-- Backup Status -->
            <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; padding:1.25rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                <h2 style="font-size:1.0625rem; font-weight:700; color:#1f2937; margin-bottom:1rem;">Backup Status</h2>

                @foreach ($backups as $idx => $bak)
                <div style="display:flex; align-items:center; justify-content:space-between; padding:0.625rem 0; {{ $idx > 0 ? 'border-top:1px solid #f3f4f6;' : '' }}">
                    <div>
                        <div style="font-size:0.8125rem; font-weight:500; color:#1f2937;">{{ $bak['label'] }}</div>
                        <div style="font-size:0.75rem; color:#9ca3af; margin-top:2px;">{{ $bak['time'] }}</div>
                    </div>
                    @if ($bak['status'] === 'Success')
                        <span style="padding:0.2rem 0.65rem; background:#dcfce7; color:#16a34a; font-size:0.75rem; font-weight:600; border-radius:0.75rem;">Success</span>
                    @else
                        <span style="padding:0.2rem 0.65rem; background:#fef9c3; color:#ca8a04; font-size:0.75rem; font-weight:600; border-radius:0.75rem;">Pending</span>
                    @endif
                </div>
                @endforeach
            </div>

        </div>

        {{-- =============== END SECURITY MANAGEMENT =============== --}}
    </main>
</div>

</body>
</html>