<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Branch')</title>
    @vite(['resources/css/app.css','resources/css/inventory.css' , 'resources/js/Inventory.js'])
</head>
<body class="bg-gray-100">
    {{-- Header Component (Full Width at Top) --}}
   <x-header 
    title="CRM" 
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
            'url' => route('CRM_Dashboard'),
            'active' => 'CRM_Dashboard',
            'page' => 'CRM_Dashboard',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-4.749zM13.749999999999998,6a3,3,0,1,1,6,0,3,3,0,0,1-6,0z\' /></svg>'
        ],
        [
            'label' => 'Returns',
            'url' => route('CRM_Return'),
            'active' => 'CRM_Return',
            'page' => 'CRM_Return',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
                [
            'label' => 'Communications',
            'url' => route('CRM_Communications'),
            'active' => 'CRM_Communications',
            'page' => 'CRM_Communications',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
                     [
            'label' => 'Analytics',
            'url' => route('CRM_Analytics'),
            'active' => 'CRM_Analytics',
            'page' => 'CRM_Analytics',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
                            [
            'label' => 'Feedbacks',
            'url' => route('CRM_Feedback'),
            'active' => 'CRM_Feedback',
            'page' => 'CRM_Feedback',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
    ]" 
   activePage="{{ request()->route()->getName() }}"
    />
    {{-- Main Content Area --}}
    <main class="flex-1 mt-16 p-6 md:ml-64  transition-all duration-300">

        {{-- =============== ANALYTICS UI =============== --}}

        @php
            $metrics = [
                ['label'=>'Total Customers','value'=>'1,248','change'=>'+12% from last month','positive'=>true],
                ['label'=>'Total Revenue','value'=>'₱89,450','change'=>'+8% from last month','positive'=>true],
                ['label'=>'Avg Order Value','value'=>'₱15,600','change'=>'-3% from last month','positive'=>false],
                ['label'=>'Return Rate','value'=>'4.2%','change'=>'-1.5% from last month','positive'=>false],
            ];

            $topCustomers = [
                ['name'=>'Danione D. Diego','orders'=>18,'total'=>54320],
                ['name'=>'John Smith','orders'=>10,'total'=>20450],
                ['name'=>'Sarah Johnson','orders'=>8,'total'=>14202],
            ];

            $loyaltyStats = [
                ['label'=>'Total Points Issued','value'=>'125,450'],
                ['label'=>'Points Redeemed','value'=>'45,230'],
                ['label'=>'Active Points','value'=>'80,220'],
                ['label'=>'Avg Resolution Time','value'=>'2.3 days'],
            ];
        @endphp

        <!-- Title -->
        <h1 style="font-size:1.5rem; font-weight:700; color:#1f2937; margin-bottom:1.25rem;">
            Analytics
        </h1>

        <!-- Metric Cards Row -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:1rem; margin-bottom:1.5rem;">
            @foreach ($metrics as $m)
            <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; padding:1.25rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                <div style="font-size:0.8125rem; color:#6b7280; margin-bottom:0.5rem;">{{ $m['label'] }}</div>
                <div style="font-size:1.875rem; font-weight:700; color:#1f2937; margin-bottom:0.35rem;">{{ $m['value'] }}</div>
                <div style="font-size:0.75rem; color:{{ $m['positive'] ? '#16a34a' : '#dc2626' }};">{{ $m['change'] }}</div>
            </div>
            @endforeach
        </div>

        <!-- Two-Column Section: Top Customers + Loyalty Overview -->
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">

            <!-- Top Customers by Spending -->
            <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; padding:1.25rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                <h2 style="font-size:1.125rem; font-weight:700; color:#1f2937; margin-bottom:1rem;">Top Customers by Spending</h2>

                @foreach ($topCustomers as $idx => $cust)
                <div style="display:flex; align-items:center; gap:0.875rem; padding:0.75rem 0; {{ $idx > 0 ? 'border-top:1px solid #f3f4f6;' : '' }}">
                    <!-- Avatar with ranking number -->
                    <div style="flex-shrink:0; width:2.5rem; height:2.5rem; border-radius:50%; background:#dbeafe; display:flex; align-items:center; justify-content:center; font-size:0.875rem; font-weight:600; color:#2563eb;">
                        {{ $idx + 1 }}
                    </div>
                    <!-- Name + Orders -->
                    <div style="flex:1;">
                        <div style="font-size:0.9375rem; font-weight:600; color:#1f2937;">{{ $cust['name'] }}</div>
                        <div style="font-size:0.75rem; color:#9ca3af; margin-top:2px;">{{ $cust['orders'] }} Orders</div>
                    </div>
                    <!-- Total Spent -->
                    <div style="font-size:0.9375rem; font-weight:700; color:#1f2937;">
                        ₱{{ number_format($cust['total'], 0) }}
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Loyalty Points Overview -->
            <div style="background:#fff; border:1px solid #e5e7eb; border-radius:0.75rem; padding:1.25rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                <h2 style="font-size:1.125rem; font-weight:700; color:#1f2937; margin-bottom:1rem;">Loyalty Points Overview</h2>

                <div style="background:#f9fafb; border-radius:0.5rem; padding:1rem;">
                    @foreach ($loyaltyStats as $idx => $stat)
                    <div style="display:flex; align-items:center; justify-content:space-between; {{ $idx > 0 ? 'margin-top:0.875rem;' : '' }}">
                        <div style="font-size:0.875rem; color:#6b7280;">{{ $stat['label'] }}</div>
                        <div style="font-size:1rem; font-weight:700; color:#1f2937;">{{ $stat['value'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- =============== END ANALYTICS =============== --}}
    </main>
</div>

</body>
</html>