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
        @yield('content')  
        {{-- Access Control Management Section --}}
          <div class="space-y-6">
                {{-- Access Control Management Title --}}
                <div>
                    <h2 class="text-2xl font-bold text-gray-700">Access Control Management</h2>
                </div>
        
                <!-- Access Logs Section -->
                <div class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow">
                    <h2 class="text-xl font-semibold text-slate-800 mb-5 flex items-center gap-2">
                        <i class="fas fa-clipboard-list text-sky-600"></i>
                        Access Logs
                    </h2>
                    
                    <div class="space-y-3">
                        <!-- Log Item 1 -->
                        <div class="log-item flex items-center justify-between py-3 px-4 rounded-lg">
                            <div class="flex items-center gap-4 flex-1">
                                <div class="w-2 h-2 rounded-full bg-emerald-500 status-dot"></div>
                                <div class="flex-1">
                                    <div class="font-semibold text-slate-800">Juan Dela Cruz</div>
                                    <div class="text-sm text-slate-500">Logged in</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-6">
                                <div class="ip-address px-3 py-1.5 rounded-lg mono text-xs font-medium text-sky-700">
                                    192.168.1.100
                                </div>
                                <div class="time-ago mono min-w-[90px] text-right">10 min ago</div>
                                <div class="text-white bg-emerald-500 px-4 py-1.5 rounded-full text-xs font-semibold min-w-[80px] text-center">
                                    Success
                                </div>
                            </div>
                        </div>
                        
                        <!-- Log Item 2 -->
                        <div class="log-item flex items-center justify-between py-3 px-4 rounded-lg">
                            <div class="flex items-center gap-4 flex-1">
                                <div class="w-2 h-2 rounded-full bg-red-500 status-dot"></div>
                                <div class="flex-1">
                                    <div class="font-semibold text-slate-800">Maria Santos</div>
                                    <div class="text-sm text-slate-500">Failed login attempt</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-6">
                                <div class="ip-address px-3 py-1.5 rounded-lg mono text-xs font-medium text-sky-700">
                                    192.168.1.105
                                </div>
                                <div class="time-ago mono min-w-[90px] text-right">25 min ago</div>
                                <div class="text-white bg-red-500 px-4 py-1.5 rounded-full text-xs font-semibold min-w-[80px] text-center">
                                    Failed
                                </div>      
                            </div>
                        </div>  
                        
                        <!-- Log Item 3 -->
                        <div class="log-item flex items-center justify-between py-3 px-4 rounded-lg">
                            <div class="flex items-center gap-4 flex-1">
                                <div class="w-2 h-2 rounded-full bg-emerald-500 status-dot"></div>
                                <div class="flex-1">
                                    <div class="font-semibold text-slate-800">Norman Moreno</div>
                                    <div class="text-sm text-slate-500">Changed password</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-6">
                                <div class="ip-address px-3 py-1.5 rounded-lg mono text-xs font-medium text-sky-700">
                                    192.168.1.110
                                </div>
                                <div class="time-ago mono min-w-[90px] text-right">1 hour ago</div>
                                <div class="text-white bg-emerald-500 px-4 py-1.5 rounded-full text-xs font-semibold min-w-[80px] text-center">
                                    Success
                                </div>
                            </div>
                        </div>
                        
                        <!-- Log Item 4 -->
                        <div class="log-item flex items-center justify-between py-3 px-4 rounded-lg">
                            <div class="flex items-center gap-4 flex-1">
                                <div class="w-2 h-2 rounded-full bg-emerald-500 status-dot"></div>
                                <div class="flex-1">
                                    <div class="font-semibold text-slate-800">Admin User</div>
                                    <div class="text-sm text-slate-500">Modified permissions</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-6">
                                <div class="ip-address px-3 py-1.5 rounded-lg mono text-xs font-medium text-sky-700">
                                    192.168.1.1
                                </div>
                                <div class="time-ago mono min-w-[90px] text-right">2 hours ago</div>
                                <div class="text-white bg-emerald-500 px-4 py-1.5 rounded-full text-xs font-semibold min-w-[80px] text-center">
                                    Success
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Access Restrictions Section -->
                <div class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow">
                    <h2 class="text-xl font-semibold text-slate-800 mb-5 flex items-center gap-2">
                        <i class="fas fa-shield-alt text-sky-600"></i>
                        Access Restrictions
                    </h2>
                    
                    <div class="space-y-4">
                        <!-- Restriction Item 1 -->
                        <div class="restriction-item flex items-center justify-between py-4 px-4 rounded-lg">
                            <div class="flex-1">
                                <div class="font-semibold text-slate-800">IP Whitelist</div>
                            </div>
                            <div class="flex items-center gap-8">
                                <div class="text-right">
                                    <div class="text-sm font-medium text-slate-700">Enabled</div>
                                    <div class="text-xs text-slate-500 mono">12 IPs</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Restriction Item 2 -->
                        <div class="restriction-item flex items-center justify-between py-4 px-4 rounded-lg">
                            <div class="flex-1">
                                <div class="font-semibold text-slate-800">Two-Factor Authentication</div>
                            </div>
                            <div class="flex items-center gap-8">
                                <div class="text-right">
                                    <div class="text-sm font-medium text-slate-700">Required</div>
                                    <div class="text-xs text-slate-500">All Admins</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Restriction Item 3 -->
                        <div class="restriction-item flex items-center justify-between py-4 px-4 rounded-lg">
                            <div class="flex-1">
                                <div class="font-semibold text-slate-800">Session Timeout</div>
                            </div>
                            <div class="flex items-center gap-8">
                                <div class="text-right">
                                    <div class="text-sm font-medium text-slate-700">30 Minutes</div>
                                    <div class="text-xs text-slate-500">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Restriction Item 4 -->
                        <div class="restriction-item flex items-center justify-between py-4 px-4 rounded-lg">
                            <div class="flex-1">
                                <div class="font-semibold text-slate-800">Failed Login Lockout</div>
                            </div>
                            <div class="flex items-center gap-8">
                                <div class="text-right">
                                    <div class="text-sm font-medium text-slate-700">5 Attempts</div>
                                    <div class="text-xs text-slate-500">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Active Sessions Section -->
                <div class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow">
                    <h2 class="text-xl font-semibold text-slate-800 mb-5 flex items-center gap-2">
                        <i class="fas fa-users text-sky-600"></i>
                        Active Sessions
                    </h2>
                    
                    <div class="space-y-3">
                        <!-- Session Item 1 -->
                        <div class="session-item flex items-center justify-between py-3 px-4 rounded-lg">
                            <div class="flex items-center gap-4 flex-1">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-sky-400 to-cyan-500 flex items-center justify-center text-white font-semibold text-sm shadow-lg">
                                    JD
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-slate-800">Juan Dela Cruz</div>
                                    <div class="text-sm text-slate-500 mono">Chrome on Windows - Manila</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="text-white bg-emerald-500 px-4 py-1.5 rounded-full text-xs font-semibold min-w-[70px] text-center">
                                    Active
                                </div>
                            </div>
                        </div>  
                        
                        <!-- Session Item 2 -->
                        <div class="session-item flex items-center justify-between py-3 px-4 rounded-lg">
                            <div class="flex items-center gap-4 flex-1">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-teal-400 to-emerald-500 flex items-center justify-center text-white font-semibold text-sm shadow-lg">
                                    MS
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-slate-800">Maria Santos</div>
                                    <div class="text-sm text-slate-500 mono">Safari on iPhone - Quezon City</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="text-white bg-emerald-500 px-4 py-1.5 rounded-full text-xs font-semibold min-w-[70px] text-center">
                                    Active
                                </div>
                            </div>
                        </div>
                        
                        <!-- Session Item 3 -->
                        <div class="session-item flex items-center justify-between py-3 px-4 rounded-lg">
                            <div class="flex items-center gap-4 flex-1">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-cyan-400 to-blue-500 flex items-center justify-center text-white font-semibold text-sm shadow-lg">
                                    NM
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-slate-800">Norman Moreno</div>
                                    <div class="text-sm text-slate-500 mono">Firefox on Mac - Makati</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="text-white bg-yellow-500 px-4 py-1.5 rounded-full text-xs font-semibold min-w-[70px] text-center">
                                    Idle
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</div>

</body>
</html>