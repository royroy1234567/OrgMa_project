@php
    // Sample data - replace with your actual database query
    $branches = [
        [
            'name' => 'Manila Branch',
            'address' => '123 Rizal Ave, Manila',
            'manager' => 'Juan Dela Cruz',
            'staff_count' => 12,
            'today_sales' => 52340,
            'monthly_sales' => '1.2M',
            'inventory_value' => '3.5M',
            'status' => 'Active'
        ],
        [
            'name' => 'Quezon City Branch',
            'address' => '456 Commonwealth Ave, QC',
            'manager' => 'Victor Isidro',
            'staff_count' => 10,
            'today_sales' => 44120,
            'monthly_sales' => '980K',
            'inventory_value' => '2.8M',
            'status' => 'Active'
        ],
        [
            'name' => 'Makati Branch',
            'address' => '789 Ayala Ave, Makati',
            'manager' => 'Marco Antonio San Jose',
            'staff_count' => 8,
            'today_sales' => 38770,
            'monthly_sales' => '850K',
            'inventory_value' => '2.2M',
            'status' => 'Active'
        ],
    ];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Management</title>
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
        {{-- Branch Management Header --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Branch Management</h1>
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                Add New Branch
            </button>
        </div>

        {{-- Branch Cards Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach($branches as $branch)
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200 hover:shadow-lg transition duration-200">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-800">{{ $branch['name'] }}</h2>
                    <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">{{ $branch['status'] }}</span>
                </div>
                <div class="space-y-2 mb-4">
                    <p class="text-sm text-gray-600">{{ $branch['address'] }}</p>
                    <p class="text-sm text-gray-600">Manager: {{ $branch['manager'] }}</p>
                    <p class="text-sm text-gray-600">Staff: {{ $branch['staff_count'] }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-sm font-semibold text-blue-600">Today's Sales: ₱{{ number_format($branch['today_sales'], 0) }}</p>
                </div>
                <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-4 py-2 rounded-lg transition duration-200">
                    View Details
                </button>
            </div>
            @endforeach
        </div>

        {{-- Branch Performance Comparison --}}
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Branch Performance Comparison</h2>
            
            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-blue-50 border-b border-gray-200">
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Branch</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Monthly Sales</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Inventory Value</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Staff Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($branches as $branch)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition duration-150">
                            <td class="py-3 px-4 text-sm text-gray-800">{{ $branch['name'] }}</td>
                            <td class="py-3 px-4 text-sm text-gray-800">₱{{ $branch['monthly_sales'] }}</td>
                            <td class="py-3 px-4 text-sm text-gray-800">₱{{ $branch['inventory_value'] }}</td>
                            <td class="py-3 px-4 text-sm text-gray-800">{{ $branch['staff_count'] }}</td>
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