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
    activePage="{{ request()->route()->getName() === 'Dashboard' ? 'dashboard' : (request()->route()->getName() === 'Products' ? 'products' : 'returns') }}"
    />
    {{-- Main Content Area --}}
    <main class="flex-1 mt-16 p-6 md:ml-64  transition-all duration-300">

        {{-- =============== COMMUNICATIONS UI =============== --}}

        @php
            $communications = [
                ['id'=>'COM-001','customer'=>'All Customers','type'=>'Promotion','subject'=>'New Year Sale - 30% OFF','channel'=>'Email','sent'=>'2025-01-13 09:00 AM','status'=>'Sent'],
                ['id'=>'COM-002','customer'=>'All Customers','type'=>'Promotion','subject'=>'Flash Sale - Limited Time Offer','channel'=>'Email','sent'=>'2025-01-10 02:00 PM','status'=>'Sent'],
                ['id'=>'COM-003','customer'=>'All Customers','type'=>'Promotion','subject'=>'New Year Sale - 30% OFF','channel'=>'Email','sent'=>'2025-01-08 10:00 AM','status'=>'Sent'],
            ];
        @endphp

        <!-- Title + Send Message Button -->
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.25rem;">
            <h1 style="font-size:1.5rem; font-weight:700; color:#1f2937;">Communications</h1>
            <button
                style="display:flex; align-items:center; gap:0.4rem; padding:0.55rem 1rem; background:#2563eb; color:#fff; border:none; border-radius:0.5rem; font-size:0.875rem; font-weight:500; cursor:pointer; box-shadow:0 1px 3px rgba(0,0,0,0.1); transition:background 0.15s;"
                onmouseover="this.style.background='#1d4ed8';"
                onmouseout="this.style.background='#2563eb';"
            >
                <svg style="width:1rem; height:1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Send Message
            </button>
        </div>

        <!-- Controls Row: Search + Filter -->
        <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:0.75rem; margin-bottom:1.25rem;">

            <!-- Search -->
            <div style="position:relative; width:100%; max-width:28rem;">
                <svg style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); width:1rem; height:1rem; color:#9ca3af; pointer-events:none;"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input
                    type="text"
                    id="comSearchInput"
                    oninput="comFilter()"
                    placeholder="Search products..."
                    style="width:100%; box-sizing:border-box; padding:0.6rem 1rem 0.6rem 2.5rem; background:#fff; border:1px solid #d1d5db; border-radius:0.5rem; font-size:0.875rem; color:#374151; outline:none; transition:border-color 0.2s, box-shadow 0.2s;"
                    onfocus="this.style.borderColor='#2563eb'; this.style.boxShadow='0 0 0 3px rgba(37,99,235,0.18)';"
                    onblur="this.style.borderColor='#d1d5db'; this.style.boxShadow='none';"
                >
            </div>

            <!-- Filter Button + Dropdown -->
            <div style="position:relative;">
                <button
                    onclick="comToggleFilter(event)"
                    style="display:flex; align-items:center; gap:0.5rem; padding:0.6rem 1rem; background:#fff; border:1px solid #d1d5db; border-radius:0.5rem; font-size:0.875rem; color:#4b5563; font-weight:500; cursor:pointer; box-shadow:0 1px 2px rgba(0,0,0,0.06); transition:background 0.15s;"
                    onmouseover="this.style.background='#f9fafb';"
                    onmouseout="this.style.background='#fff';"
                >
                    <svg style="width:1rem; height:1rem; color:#6b7280;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/>
                    </svg>
                    Filter
                </button>

                <!-- Dropdown -->
                <div id="comFilterDrop" style="display:none; position:absolute; top:calc(100% + 6px); right:0; z-index:50; background:#fff; border:1px solid #e5e7eb; border-radius:0.625rem; box-shadow:0 8px 24px rgba(0,0,0,0.10); min-width:200px; padding:0.625rem 0;">
                    <label style="display:flex; align-items:center; gap:0.5rem; padding:0.45rem 1rem; cursor:pointer; font-size:0.8125rem; color:#374151;"
                           onmouseover="this.style.background='#f0f4ff';" onmouseout="this.style.background='transparent';">
                        <input type="checkbox" checked onchange="comFilter()" style="accent-color:#2563eb; width:15px; height:15px; cursor:pointer;"> Sent
                    </label>
                    <label style="display:flex; align-items:center; gap:0.5rem; padding:0.45rem 1rem; cursor:pointer; font-size:0.8125rem; color:#374151;"
                           onmouseover="this.style.background='#f0f4ff';" onmouseout="this.style.background='transparent';">
                        <input type="checkbox" checked onchange="comFilter()" style="accent-color:#2563eb; width:15px; height:15px; cursor:pointer;"> Pending
                    </label>
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div style="background:#fff; border-radius:0.75rem; box-shadow:0 1px 3px rgba(0,0,0,0.08); border:1px solid #e5e7eb; overflow:hidden;">
            <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse; text-align:left;">

                    <!-- THEAD -->
                    <thead>
                        <tr style="background:#f9fafb; border-bottom:1px solid #e5e7eb;">
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Case ID</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Customer</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Type</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Subject</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Channel</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Sent Date</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Status</th>
                        </tr>
                    </thead>

                    <!-- TBODY -->
                    <tbody id="comTableBody">
                        @foreach ($communications as $c)
                        <tr class="com-row"
                            data-status="{{ strtolower($c['status']) }}"
                            style="border-bottom:1px solid #f3f4f6; transition:background 0.15s;"
                            onmouseover="this.style.background='#f0f4ff';"
                            onmouseout="this.style.background='transparent';"
                        >
                            <!-- Case ID -->
                            <td style="padding:0.875rem 1.25rem; font-size:0.875rem; font-weight:600; color:#1f2937;">
                                {{ $c['id'] }}
                            </td>

                            <!-- Customer -->
                            <td style="padding:0.875rem 1.25rem; font-size:0.875rem; color:#374151;">
                                {{ $c['customer'] }}
                            </td>

                            <!-- Type (blue link-style) -->
                            <td style="padding:0.875rem 1.25rem;">
                                <span style="font-size:0.875rem; font-weight:500; color:#2563eb;">{{ $c['type'] }}</span>
                            </td>

                            <!-- Subject -->
                            <td style="padding:0.875rem 1.25rem; font-size:0.875rem; color:#374151;">
                                {{ $c['subject'] }}
                            </td>

                            <!-- Channel (green text) -->
                            <td style="padding:0.875rem 1.25rem;">
                                <span style="font-size:0.875rem; font-weight:600; color:#16a34a;">{{ $c['channel'] }}</span>
                            </td>

                            <!-- Sent Date -->
                            <td style="padding:0.875rem 1.25rem; font-size:0.875rem; color:#374151; white-space:nowrap;">
                                {{ $c['sent'] }}
                            </td>

                            <!-- Status (green) -->
                            <td style="padding:0.875rem 1.25rem;">
                                <span style="font-size:0.875rem; font-weight:600; color:#16a34a;">{{ $c['status'] }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Empty State -->
                <div id="comEmptyState" style="display:none; text-align:center; padding:3rem 1rem; color:#6b7280; font-size:0.875rem;">
                    No communications found matching your criteria.
                </div>
            </div>
        </div>

        {{-- =============== END COMMUNICATIONS =============== --}}
    </main>
</div>

</body>
</html>

<!-- =============== JS: Search & Filter =============== -->
<script>
    function comToggleFilter(e) {
        e.stopPropagation();
        var drop = document.getElementById('comFilterDrop');
        drop.style.display = (drop.style.display === 'block') ? 'none' : 'block';
    }

    document.addEventListener('click', function () {
        var drop = document.getElementById('comFilterDrop');
        if (drop) drop.style.display = 'none';
    });

    function comFilter() {
        var search = document.getElementById('comSearchInput').value.toLowerCase();
        var cbs    = document.querySelectorAll('#comFilterDrop input[type="checkbox"]');

        var showSent    = cbs[0] ? cbs[0].checked : true;
        var showPending = cbs[1] ? cbs[1].checked : true;

        var rows    = document.querySelectorAll('#comTableBody tr.com-row');
        var visible = 0;

        rows.forEach(function (row) {
            var text   = row.innerText.toLowerCase();
            var status = row.dataset.status;

            if (status === 'sent'    && !showSent)    { row.style.display = 'none'; return; }
            if (status === 'pending' && !showPending) { row.style.display = 'none'; return; }
            if (search && !text.includes(search))     { row.style.display = 'none'; return; }

            row.style.display = '';
            visible++;
        });

        document.getElementById('comEmptyState').style.display = (visible === 0) ? 'block' : 'none';
    }
</script>