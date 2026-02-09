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

        {{-- =============== SYSTEM SETTINGS UI =============== --}}

        <!-- Title -->
        <h1 style="font-size:1.5rem; font-weight:700; color:#1f2937; margin-bottom:1.25rem;">
            System Settings
        </h1>

        <!-- Top Row: General Settings + Notification -->
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:1rem;">

            <!-- General Settings Panel -->
            <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; padding:1.5rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                <h2 style="font-size:1.0625rem; font-weight:700; color:#1f2937; margin-bottom:1.25rem;">General Settings</h2>

                <!-- Form Fields (label on left, input on right) -->
                <div style="display:flex; flex-direction:column; gap:1rem;">

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <label style="font-size:0.875rem; color:#374151; min-width:120px;">Company Name</label>
                        <input type="text" value="FC Home Center" style="flex:1; padding:0.5rem 0.75rem; background:#f9fafb; border:1px solid #d1d5db; border-radius:0.5rem; font-size:0.875rem; color:#374151;">
                    </div>

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <label style="font-size:0.875rem; color:#374151; min-width:120px;">Contact Email</label>
                        <input type="email" value="info@fchomecenter.com" style="flex:1; padding:0.5rem 0.75rem; background:#f9fafb; border:1px solid #d1d5db; border-radius:0.5rem; font-size:0.875rem; color:#374151;">
                    </div>

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <label style="font-size:0.875rem; color:#374151; min-width:120px;">Contact Phone</label>
                        <input type="text" value="+63 2 1234 5678" style="flex:1; padding:0.5rem 0.75rem; background:#f9fafb; border:1px solid #d1d5db; border-radius:0.5rem; font-size:0.875rem; color:#374151;">
                    </div>

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <label style="font-size:0.875rem; color:#374151; min-width:120px;">Timezone</label>
                        <select style="flex:1; padding:0.5rem 2rem 0.5rem 0.75rem; background:#f9fafb url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3E%3Cpath stroke=%27%236b7280%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%271.5%27 d=%27M6 8l4 4 4-4%27/%3E%3C/svg%3E') no-repeat right 0.5rem center / 1.25rem; border:1px solid #d1d5db; border-radius:0.5rem; font-size:0.875rem; color:#374151; appearance:none;">
                            <option>Asia/Metro Manila</option>
                        </select>
                    </div>

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <label style="font-size:0.875rem; color:#374151; min-width:120px;">Currency</label>
                        <select style="flex:1; padding:0.5rem 2rem 0.5rem 0.75rem; background:#f9fafb url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3E%3Cpath stroke=%27%236b7280%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%271.5%27 d=%27M6 8l4 4 4-4%27/%3E%3C/svg%3E') no-repeat right 0.5rem center / 1.25rem; border:1px solid #d1d5db; border-radius:0.5rem; font-size:0.875rem; color:#374151; appearance:none;">
                            <option>Php (₱)</option>
                        </select>
                    </div>

                </div>
            </div>

            <!-- Notification Panel -->
            <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; padding:1.5rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                <h2 style="font-size:1.0625rem; font-weight:700; color:#1f2937; margin-bottom:1.25rem;">Notification</h2>

                <div style="display:flex; flex-direction:column; gap:1.25rem;">

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <label style="font-size:0.875rem; color:#374151;">Email Notifications</label>
                        <div class="toggle-switch active" onclick="this.classList.toggle('active')">
                            <div class="toggle-switch-slider"></div>
                        </div>
                    </div>

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <label style="font-size:0.875rem; color:#374151;">SMS Alerts</label>
                        <div class="toggle-switch active" onclick="this.classList.toggle('active')">
                            <div class="toggle-switch-slider"></div>
                        </div>
                    </div>

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <label style="font-size:0.875rem; color:#374151;">Low Stock Alerts</label>
                        <div class="toggle-switch" onclick="this.classList.toggle('active')">
                            <div class="toggle-switch-slider"></div>
                        </div>
                    </div>

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <label style="font-size:0.875rem; color:#374151;">Daily Reports</label>
                        <div class="toggle-switch active" onclick="this.classList.toggle('active')">
                            <div class="toggle-switch-slider"></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Bottom Row: System Maintenance + System Information -->
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">

            <!-- System Maintenance Panel -->
            <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; padding:1.5rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                <h2 style="font-size:1.0625rem; font-weight:700; color:#1f2937; margin-bottom:1.25rem;">System Maintenance</h2>

                <div style="display:flex; flex-direction:column; gap:0.75rem;">

                    <button style="width:100%; padding:0.65rem; background:#2563eb; color:#fff; border:none; border-radius:0.5rem; font-size:0.875rem; font-weight:500; cursor:pointer; transition:background 0.15s;"
                            onmouseover="this.style.background='#1d4ed8';"
                            onmouseout="this.style.background='#2563eb';">
                        Clear Cache
                    </button>

                    <button style="width:100%; padding:0.65rem; background:#9ca3af; color:#fff; border:none; border-radius:0.5rem; font-size:0.875rem; font-weight:500; cursor:pointer; transition:background 0.15s;"
                            onmouseover="this.style.background='#6b7280';"
                            onmouseout="this.style.background='#9ca3af';">
                        Backup Database
                    </button>

                    <button style="width:100%; padding:0.65rem; background:#ef4444; color:#fff; border:none; border-radius:0.5rem; font-size:0.875rem; font-weight:500; cursor:pointer; transition:background 0.15s;"
                            onmouseover="this.style.background='#dc2626';"
                            onmouseout="this.style.background='#ef4444';">
                        Run Diagnostics
                    </button>

                </div>
            </div>

            <!-- System Information Panel -->
            <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; padding:1.5rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                <h2 style="font-size:1.0625rem; font-weight:700; color:#1f2937; margin-bottom:1.25rem;">System Information</h2>

                <div style="display:flex; flex-direction:column; gap:1rem;">

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <span style="font-size:0.875rem; color:#6b7280;">Version</span>
                        <span style="font-size:0.875rem; font-weight:600; color:#1f2937;">2.4.1</span>
                    </div>

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <span style="font-size:0.875rem; color:#6b7280;">Last Update</span>
                        <span style="font-size:0.875rem; font-weight:600; color:#1f2937;">January 01, 2026</span>
                    </div>

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <span style="font-size:0.875rem; color:#6b7280;">Database Size</span>
                        <span style="font-size:0.875rem; font-weight:600; color:#1f2937;">22.3 GB</span>
                    </div>

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <span style="font-size:0.875rem; color:#6b7280;">Uptime</span>
                        <span style="font-size:0.875rem; font-weight:600; color:#1f2937;">15 days</span>
                    </div>

                </div>
            </div>

        </div>

        {{-- =============== END SYSTEM SETTINGS =============== --}}
    </main>
</div>

</body>
</html>