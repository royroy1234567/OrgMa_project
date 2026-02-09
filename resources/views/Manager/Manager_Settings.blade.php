
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Settings</title>
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
    <main class="flex-1 mt-16 p-6 md:ml-64 transition-all duration-300">

        @php
    // Sample data - replace with your actual database query
    $generalSettings = [
        ['label' => 'Company Name', 'value' => 'FC Home Center', 'type' => 'text'],
        ['label' => 'Contact Email', 'value' => 'info@fchomecenter.com', 'type' => 'text'],
        ['label' => 'Contact Phone', 'value' => '+63 2 1234 5678', 'type' => 'text'],
        ['label' => 'Timezone', 'value' => 'Asia/Metro Manila', 'type' => 'select', 'options' => ['Asia/Metro Manila', 'Asia/Singapore', 'Asia/Tokyo']],
        ['label' => 'Currency', 'value' => 'Php (₱)', 'type' => 'select', 'options' => ['Php (₱)', 'USD ($)', 'EUR (€)']],
    ];

    $notifications = [
        ['label' => 'Email Notifications', 'enabled' => true],
        ['label' => 'SMS Alerts', 'enabled' => true],
        ['label' => 'Low Stock Alerts', 'enabled' => false],
        ['label' => 'Daily Reports', 'enabled' => true],
    ];

    $maintenanceButtons = [
        ['label' => 'Clear Cache', 'color' => 'blue'],
        ['label' => 'Backup Database', 'color' => 'gray'],
        ['label' => 'Run Diagnostics', 'color' => 'red'],
    ];

    $systemInfo = [
        ['label' => 'Version', 'value' => '2.4.1'],
        ['label' => 'Last Update', 'value' => 'January 07, 2026'],
        ['label' => 'Database Size', 'value' => '22.3 GB'],
        ['label' => 'Uptime', 'value' => '15 days'],
    ];
@endphp

        {{-- Page Title --}}
        <h1 class="text-2xl font-bold text-gray-800 mb-6">System Settings</h1>

        {{-- Grid Container --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            {{-- General Settings Card --}}
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
                <h2 class="text-lg font-bold text-gray-800 mb-4">General Settings</h2>
                
                <div class="space-y-4">
                    @foreach($generalSettings as $setting)
                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-600 mb-2">{{ $setting['label'] }}</label>
                        @if($setting['type'] === 'text')
                            <input type="text" value="{{ $setting['value'] }}" class="px-3 py-2 border border-gray-300 rounded-lg text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @elseif($setting['type'] === 'select')
                            <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @foreach($setting['options'] as $option)
                                    <option {{ $option === $setting['value'] ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Notification Settings Card --}}
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Notification</h2>
                
                <div class="space-y-4">
                    @foreach($notifications as $notification)
                    <div class="flex justify-between items-center">
                        <label class="text-sm font-medium text-gray-700">{{ $notification['label'] }}</label>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" {{ $notification['enabled'] ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- System Maintenance Card --}}
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
                <h2 class="text-lg font-bold text-gray-800 mb-4">System Maintenance</h2>
                
                <div class="space-y-3">
                    @foreach($maintenanceButtons as $button)
                        @php
                            $colorClasses = [
                                'blue' => 'bg-blue-600 hover:bg-blue-700 text-white',
                                'gray' => 'bg-gray-300 hover:bg-gray-400 text-gray-700',
                                'red' => 'bg-red-500 hover:bg-red-600 text-white',
                            ];
                        @endphp
                        <button class="w-full py-2.5 rounded-lg font-medium text-sm transition duration-200 {{ $colorClasses[$button['color']] }}">
                            {{ $button['label'] }}
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- System Information Card --}}
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
                <h2 class="text-lg font-bold text-gray-800 mb-4">System Information</h2>
                
                <div class="space-y-3">
                    @foreach($systemInfo as $info)
                    <div class="flex justify-between items-center py-2 border-b border-gray-100 last:border-b-0">
                        <span class="text-sm font-medium text-gray-600">{{ $info['label'] }}</span>
                        <span class="text-sm font-semibold text-gray-800">{{ $info['value'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </main>
</div>

</body>
</html>