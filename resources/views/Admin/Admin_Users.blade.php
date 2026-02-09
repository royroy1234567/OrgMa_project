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
        {{-- User Management Section --}}
            <div class="space-y-6">
                {{-- User Management Title --}}
                <div>
                    <h2 class="text-2xl font-bold text-gray-700">User Management</h2>
                </div>

                <!-- Main Content Card -->
                <div class="bg-white rounded-2xl shadow-xl shadow-indigo-100/50 p-8 border border-indigo-100/30 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <!-- Filters Bar -->
                    <div class="flex gap-4 mb-6 flex-wrap">
                        <!-- Search -->
                        <div class="flex-1 min-w-[250px]">
                            <div class="relative">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-4.35-4.35m1.85-5.4a7.25 7.25 0 11-14.5 0 7.25 7.25 0 0114.5 0z" />
                                </svg>

                                <input 
                                    type="text" 
                                    placeholder="Search users..." 
                                    class="search-input w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-400 transition-all"
                                >
                            </div>
                        </div>
                        
                        <!-- Role Filter -->
                        <div class="min-w-[180px]">
                            <select class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-400 transition-all text-slate-700 bg-white cursor-pointer">
                                <option>All Roles</option>
                                <option>Branch Manager</option>
                                <option>Sales Staff</option>
                            </select>
                        </div>
                        
                        <!-- Branch Filter -->
                        <div class="min-w-[180px]">
                            <select class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-400 transition-all text-slate-700 bg-white cursor-pointer">
                                <option>All Branches</option>
                                <option>Manila</option>
                                <option>Quezon City</option>
                                <option>Makati</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Table -->
                    <div class="overflow-hidden rounded-xl border border-slate-200">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gradient-to-r from-slate-50 to-indigo-50">
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Role</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Branch</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <!-- User 1 -->
                                <tr class="table-row">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-slate-800">Juan Dela Cruz</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-slate-600 mono text-sm">juan@fc.com</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-purple-100 text-purple-700">
                                            Branch Manager
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-slate-700 font-medium">Manila</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge status-active inline-flex items-center px-4 py-1.5 pl-5 rounded-full text-sm font-semibold bg-emerald-50 text-emerald-700">
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <button class="action-btn w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </button>

                                            <button class="action-btn w-9 h-9 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 flex items-center justify-center" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 3.487a2.25 2.25 0 013.182 3.182L7.125 19.588 3 21l1.412-4.125L16.862 3.487z" />
                                                </svg>
                                            </button>

                                            <button class="action-btn w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21L18 19.5a2.25 2.25 0 01-2.244 2.25H8.244A2.25 2.25 0 016 19.5L4.772 5.79M9 5.25V3.75A1.5 1.5 0 0110.5 2.25h3A1.5 1.5 0 0115 3.75v1.5m-9 0h12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- User 2 -->
                                <tr class="table-row">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-slate-800">Maria Santos</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-slate-600 mono text-sm">maria@fc.com</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-blue-100 text-blue-700">
                                            Sales Staff
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-slate-700 font-medium">Quezon City</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge status-inactive inline-flex items-center px-4 py-1.5 pl-5 rounded-full text-sm font-semibold bg-slate-100 text-slate-600">
                                            Inactive
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <button class="action-btn w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </button>

                                            <button class="action-btn w-9 h-9 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 flex items-center justify-center" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 3.487a2.25 2.25 0 013.182 3.182L7.125 19.588 3 21l1.412-4.125L16.862 3.487z" />
                                                </svg>
                                            </button>

                                            <button class="action-btn w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21L18 19.5a2.25 2.25 0 01-2.244 2.25H8.244A2.25 2.25 0 016 19.5L4.772 5.79M9 5.25V3.75A1.5 1.5 0 0110.5 2.25h3A1.5 1.5 0 0115 3.75v1.5m-9 0h12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- User 3 -->
                                <tr class="table-row">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-slate-800">Felipe Agoncillo</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-slate-600 mono text-sm">felipe@fc.com</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-blue-100 text-blue-700">
                                            Sales Staff
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-slate-700 font-medium">Manila</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge status-active inline-flex items-center px-4 py-1.5 pl-5 rounded-full text-sm font-semibold bg-emerald-50 text-emerald-700">
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <button class="action-btn w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </button>

                                            <button class="action-btn w-9 h-9 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 flex items-center justify-center" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 3.487a2.25 2.25 0 013.182 3.182L7.125 19.588 3 21l1.412-4.125L16.862 3.487z" />
                                                </svg>
                                            </button>

                                            <button class="action-btn w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21L18 19.5a2.25 2.25 0 01-2.244 2.25H8.244A2.25 2.25 0 016 19.5L4.772 5.79M9 5.25V3.75A1.5 1.5 0 0110.5 2.25h3A1.5 1.5 0 0115 3.75v1.5m-9 0h12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- User 4 -->
                                <tr class="table-row">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-slate-800">Norman Moreno</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-slate-600 mono text-sm">norman@fc.com</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-blue-100 text-blue-700">
                                            Sales Staff
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-slate-700 font-medium">Manila</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge status-active inline-flex items-center px-4 py-1.5 pl-5 rounded-full text-sm font-semibold bg-emerald-50 text-emerald-700">
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <button class="action-btn w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </button>

                                            <button class="action-btn w-9 h-9 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 flex items-center justify-center" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 3.487a2.25 2.25 0 013.182 3.182L7.125 19.588 3 21l1.412-4.125L16.862 3.487z" />
                                                </svg>
                                            </button>

                                            <button class="action-btn w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21L18 19.5a2.25 2.25 0 01-2.244 2.25H8.244A2.25 2.25 0 016 19.5L4.772 5.79M9 5.25V3.75A1.5 1.5 0 0110.5 2.25h3A1.5 1.5 0 0115 3.75v1.5m-9 0h12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- User 5 -->
                                <tr class="table-row">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-slate-800">Marco San Jose</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-slate-600 mono text-sm">marco@fc.com</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-purple-100 text-purple-700">
                                            Branch Manager
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-slate-700 font-medium">Makati</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge status-active inline-flex items-center px-4 py-1.5 pl-5 rounded-full text-sm font-semibold bg-emerald-50 text-emerald-700">
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <button class="action-btn w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </button>

                                            <button class="action-btn w-9 h-9 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 flex items-center justify-center" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 3.487a2.25 2.25 0 013.182 3.182L7.125 19.588 3 21l1.412-4.125L16.862 3.487z" />
                                                </svg>
                                            </button>

                                            <button class="action-btn w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21L18 19.5a2.25 2.25 0 01-2.244 2.25H8.244A2.25 2.25 0 016 19.5L4.772 5.79M9 5.25V3.75A1.5 1.5 0 0110.5 2.25h3A1.5 1.5 0 0115 3.75v1.5m-9 0h12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- User 6 -->
                                <tr class="table-row">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-slate-800">Victor Isidro</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-slate-600 mono text-sm">victor@fc.com</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-purple-100 text-purple-700">
                                            Branch Manager
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-slate-700 font-medium">Quezon City</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge status-inactive inline-flex items-center px-4 py-1.5 pl-5 rounded-full text-sm font-semibold bg-slate-100 text-slate-600">
                                            Inactive
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <button class="action-btn w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </button>

                                            <button class="action-btn w-9 h-9 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 flex items-center justify-center" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 3.487a2.25 2.25 0 013.182 3.182L7.125 19.588 3 21l1.412-4.125L16.862 3.487z" />
                                                </svg>
                                            </button>

                                            <button class="action-btn w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21L18 19.5a2.25 2.25 0 01-2.244 2.25H8.244A2.25 2.25 0 016 19.5L4.772 5.79M9 5.25V3.75A1.5 1.5 0 0110.5 2.25h3A1.5 1.5 0 0115 3.75v1.5m-9 0h12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-4 mt-6 justify-end">
                        <button class="btn-secondary px-6 py-3 rounded-xl text-white font-semibold flex items-center gap-2 hover:shadow-lg">
                            <i class="fas fa-archive"></i>
                            Archive Accounts
                        </button>
                        <button class="btn-primary px-6 py-3 rounded-xl text-white font-semibold flex items-center gap-2">
                            <i class="fas fa-plus"></i>
                            Add New User
                        </button>
                    </div>
                </div>
           </div>
    </main>
</div>

</body>
</html>