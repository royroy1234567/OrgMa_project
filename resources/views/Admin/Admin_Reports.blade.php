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
        {{-- Reports & Analytics Section --}}
            <div class="space-y-6">

                <div class="flex items-center justify-between">
                    {{-- Reports & Analytics Title --}}
                    <div>
                        <h2 class="text-2xl font-bold text-gray-700">Reports & Analytics</h2>
                    </div>
                    <button class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Generate Report
                    </button>
                </div>

                {{-- Report Type Cards --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    {{-- Recent Reports Card --}}
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-slate-200 cursor-pointer group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-slate-800 mb-1">Recent Reports</h3>
                                <p class="text-sm text-slate-500">Daily, Weekly,</p>
                                <p class="text-sm text-slate-500">Monthly sales</p>
                            </div>
                            <div class="w-16 h-16 bg-blue-50 rounded-xl flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 7h1m4 0h1"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Inventory Report Card --}}
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-slate-200 cursor-pointer group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-slate-800 mb-1">Inventory Report</h3>
                                <p class="text-sm text-slate-500">Stock levels and</p>
                                <p class="text-sm text-slate-500">movement</p>
                            </div>
                            <div class="w-16 h-16 bg-blue-50 rounded-xl flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- User Activity Card --}}
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-slate-200 cursor-pointer group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-slate-800 mb-1">User Activity</h3>
                                <p class="text-sm text-slate-500">Staff performance</p>
                                <p class="text-sm text-slate-500">metrics</p>
                            </div>
                            <div class="w-16 h-16 bg-blue-50 rounded-xl flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Financial Report Card --}}
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-slate-200 cursor-pointer group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-slate-800 mb-1">Financial Report</h3>
                                <p class="text-sm text-slate-500">Revenue and</p>
                                <p class="text-sm text-slate-500">expenses</p>
                            </div>
                            <div class="w-16 h-16 bg-blue-50 rounded-xl flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Recent Reports Section (Full Width) --}}
                <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                        <h2 class="text-xl font-bold text-slate-800">Recent Reports</h2>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        {{-- Report Item 1 --}}
                        <div class="flex items-center justify-between p-4 hover:bg-slate-50 rounded-xl transition-colors cursor-pointer group">
                            <div class="flex-1">
                                <h3 class="text-base font-semibold text-slate-800 mb-1 group-hover:text-blue-600 transition-colors">
                                    Monthly Sales Report - December 2024
                                </h3>
                                <p class="text-sm text-slate-500">Generated by Admin</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-slate-600">Jan 5, 2025</p>
                            </div>
                        </div>

                        {{-- Report Item 2 --}}
                        <div class="flex items-center justify-between p-4 hover:bg-slate-50 rounded-xl transition-colors cursor-pointer group">
                            <div class="flex-1">
                                <h3 class="text-base font-semibold text-slate-800 mb-1 group-hover:text-blue-600 transition-colors">
                                    Inventory Audit - Manila Branch
                                </h3>
                                <p class="text-sm text-slate-500">Generated by Juan Dela Cruz</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-slate-600">Jan 3, 2025</p>
                            </div>
                        </div>

                        {{-- Report Item 3 --}}
                        <div class="flex items-center justify-between p-4 hover:bg-slate-50 rounded-xl transition-colors cursor-pointer group">
                            <div class="flex-1">
                                <h3 class="text-base font-semibold text-slate-800 mb-1 group-hover:text-blue-600 transition-colors">
                                    Year-End Financial Summary 2024
                                </h3>
                                <p class="text-sm text-slate-500">Generated by Admin</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-slate-600">Jan 1, 2025</p>
                            </div>
                        </div>

                        {{-- Report Item 4 --}}
                        <div class="flex items-center justify-between p-4 hover:bg-slate-50 rounded-xl transition-colors cursor-pointer group">
                            <div class="flex-1">
                                <h3 class="text-base font-semibold text-slate-800 mb-1 group-hover:text-blue-600 transition-colors">
                                    Staff Performance Report Q4 2024
                                </h3>
                                <p class="text-sm text-slate-500">Generated by Maria Santos</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-slate-600">Dec 31, 2024</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bottom Grid: Quick Stats and Report Schedule --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    
                    {{-- Quick Stats Card --}}
                    <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
                        <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                            <h2 class="text-xl font-bold text-slate-800">Quick Stats</h2>
                        </div>
                        
                        <div class="p-6 space-y-4">
                            {{-- Stat Item 1 --}}
                            <div class="flex items-center justify-between py-3 border-b border-slate-100">
                                <div class="text-sm font-medium text-slate-600">Total Revenue (2024)</div>
                                <div class="text-base font-bold text-slate-800">₱45.2M</div>
                            </div>

                            {{-- Stat Item 2 --}}
                            <div class="flex items-center justify-between py-3 border-b border-slate-100">
                                <div class="text-sm font-medium text-slate-600">Total Orders</div>
                                <div class="text-base font-bold text-slate-800">3,247</div>
                            </div>

                            {{-- Stat Item 3 --}}
                            <div class="flex items-center justify-between py-3 border-b border-slate-100">
                                <div class="text-sm font-medium text-slate-600">Average Order Value</div>
                                <div class="text-base font-bold text-slate-800">₱13,920</div>
                            </div>

                            {{-- Stat Item 4 --}}
                            <div class="flex items-center justify-between py-3">
                                <div class="text-sm font-medium text-slate-600">Customer Satisfaction</div>
                                <div class="text-base font-bold text-slate-800">4.5/5</div>
                            </div>
                        </div>
                    </div>

                    {{-- Report Schedule Card --}}
                    <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
                        <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                            <h2 class="text-xl font-bold text-slate-800">Report Schedule</h2>
                        </div>
                        
                        <div class="p-6 space-y-4">
                            {{-- Schedule Item 1 --}}
                            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h3 class="text-sm font-semibold text-slate-800">Daily Sales Summary</h3>
                                </div>
                                <p class="text-xs text-slate-500">Every day at 6:00 PM</p>
                            </div>

                            {{-- Schedule Item 2 --}}
                            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h3 class="text-sm font-semibold text-slate-800">Weekly Inventory Check</h3>
                                </div>
                                <p class="text-xs text-slate-500">Every Monday at 9:00 AM</p>
                            </div>

                            {{-- Schedule Item 3 --}}
                            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h3 class="text-sm font-semibold text-slate-800">Monthly Financial Report</h3>
                                </div>
                                <p class="text-xs text-slate-500">1st of every month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</div>

</body>
</html>