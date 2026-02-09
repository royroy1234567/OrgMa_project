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
    <main class="flex-1 mt-16 p-6 md:ml-64  transition-all duration-300">

        {{-- =============== CUSTOMER MANAGEMENT UI =============== --}}

        <!-- Title -->
        <h1 style="font-size:1.5rem; font-weight:700; color:#1f2937; margin-bottom:1.5rem;">
            Customer Management
        </h1>

        <!-- Controls Row: Search + Filter -->
        <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:0.75rem; margin-bottom:1.25rem;">

            <!-- Search Box -->
            <div style="position:relative; width:100%; max-width:28rem;">
                <svg style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); width:1rem; height:1rem; color:#9ca3af; pointer-events:none;"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input
                    type="text"
                    id="custSearchInput"
                    oninput="custFilter()"
                    placeholder="Search products..."
                    style="width:100%; box-sizing:border-box; padding:0.6rem 1rem 0.6rem 2.5rem; background:#fff; border:1px solid #d1d5db; border-radius:0.5rem; font-size:0.875rem; color:#374151; outline:none; transition:border-color 0.2s, box-shadow 0.2s;"
                    onfocus="this.style.borderColor='#2563eb'; this.style.boxShadow='0 0 0 3px rgba(37,99,235,0.18)';"
                    onblur="this.style.borderColor='#d1d5db'; this.style.boxShadow='none';"
                >
            </div>

            <!-- Filter Button + Dropdown -->
            <div style="position:relative;">
                <button
                    onclick="custToggleFilter(event)"
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

                <!-- Dropdown Panel -->
                <div id="custFilterDrop" style="display:none; position:absolute; top:calc(100% + 6px); right:0; z-index:50; background:#fff; border:1px solid #e5e7eb; border-radius:0.625rem; box-shadow:0 8px 24px rgba(0,0,0,0.10); min-width:200px; padding:0.625rem 0;">
                    <label style="display:flex; align-items:center; gap:0.5rem; padding:0.45rem 1rem; cursor:pointer; font-size:0.8125rem; color:#374151;"
                           onmouseover="this.style.background='#f0f4ff';" onmouseout="this.style.background='transparent';">
                        <input type="checkbox" checked onchange="custFilter()" style="accent-color:#2563eb; width:15px; height:15px; cursor:pointer;"> Active
                    </label>
                    <label style="display:flex; align-items:center; gap:0.5rem; padding:0.45rem 1rem; cursor:pointer; font-size:0.8125rem; color:#374151;"
                           onmouseover="this.style.background='#f0f4ff';" onmouseout="this.style.background='transparent';">
                        <input type="checkbox" checked onchange="custFilter()" style="accent-color:#2563eb; width:15px; height:15px; cursor:pointer;"> Inactive
                    </label>
                    <hr style="margin:0.375rem 0; border:none; border-top:1px solid #e5e7eb;">
                    <label style="display:flex; align-items:center; gap:0.5rem; padding:0.45rem 1rem; cursor:pointer; font-size:0.8125rem; color:#374151;"
                           onmouseover="this.style.background='#f0f4ff';" onmouseout="this.style.background='transparent';">
                        <input type="checkbox" checked onchange="custFilter()" style="accent-color:#2563eb; width:15px; height:15px; cursor:pointer;"> High Spenders (₱30k+)
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
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Customer ID</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Name</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Contact</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap; text-align:center;">Orders</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Total Spent</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap; text-align:center;">Points</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Status</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Last Purchase</th>
                            <th style="padding:0.75rem 1.25rem; font-size:0.7rem; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.05em; white-space:nowrap;">Action</th>
                        </tr>
                    </thead>

                    <!-- TBODY -->
                    <tbody id="custTableBody">
                        @php
                            $customers = [
                                ['id'=>'CUST-001','name'=>'John Smith','email'=>'johnsmith@gmail.com','phone'=>'+1234567890','orders'=>10,'total_spent'=>20450,'points'=>204,'status'=>'Active','last_purchase'=>'2025-01-10'],
                                ['id'=>'CUST-002','name'=>'Sarah Johnson','email'=>'sarahjohnson@gmail.com','phone'=>'+1234567891','orders'=>8,'total_spent'=>14202,'points'=>142,'status'=>'Active','last_purchase'=>'2025-05-10'],
                                ['id'=>'CUST-003','name'=>'Mike Chen','email'=>'mikechen@gmail.com','phone'=>'+1234567892','orders'=>2,'total_spent'=>8320,'points'=>83,'status'=>'Active','last_purchase'=>'2025-16-10'],
                                ['id'=>'CUST-004','name'=>'Danione D. Diego','email'=>'daniondiego@gmail.com','phone'=>'+1234567893','orders'=>18,'total_spent'=>54450,'points'=>544,'status'=>'Active','last_purchase'=>'2025-29-10'],
                            ];
                        @endphp

                        @foreach ($customers as $c)
                        <tr class="cust-row"
                            data-status="{{ strtolower($c['status']) }}"
                            data-total="{{ $c['total_spent'] }}"
                            style="border-bottom:1px solid #f3f4f6; transition:background 0.15s;"
                            onmouseover="this.style.background='#f0f4ff';"
                            onmouseout="this.style.background='transparent';"
                        >
                            <td style="padding:0.875rem 1.25rem; font-size:0.875rem; font-weight:600; color:#1f2937; white-space:nowrap;">{{ $c['id'] }}</td>

                            <td style="padding:0.875rem 1.25rem; font-size:0.875rem; font-weight:500; color:#1f2937; white-space:nowrap;">{{ $c['name'] }}</td>

                            <td style="padding:0.875rem 1.25rem;">
                                <div style="font-size:0.8125rem; color:#374151;">{{ $c['email'] }}</div>
                                <div style="font-size:0.75rem; color:#9ca3af; margin-top:2px;">{{ $c['phone'] }}</div>
                            </td>

                            <td style="padding:0.875rem 1.25rem; font-size:0.875rem; color:#374151; text-align:center;">{{ $c['orders'] }}</td>

                            <td style="padding:0.875rem 1.25rem; font-size:0.875rem; font-weight:600; color:#1f2937;">₱{{ number_format($c['total_spent'], 0) }}</td>

                            <td style="padding:0.875rem 1.25rem; font-size:0.875rem; color:#374151; text-align:center;">{{ $c['points'] }}</td>

                            <td style="padding:0.875rem 1.25rem;">
                                @if (strtolower($c['status']) === 'active')
                                    <span style="display:inline-block; padding:0.2rem 0.625rem; border-radius:0.75rem; font-size:0.75rem; font-weight:600; color:#16a34a; background:#dcfce7;">{{ $c['status'] }}</span>
                                @else
                                    <span style="display:inline-block; padding:0.2rem 0.625rem; border-radius:0.75rem; font-size:0.75rem; font-weight:600; color:#dc2626; background:#fee2e2;">{{ $c['status'] }}</span>
                                @endif
                            </td>

                            <td style="padding:0.875rem 1.25rem; font-size:0.875rem; color:#6b7280; white-space:nowrap;">{{ $c['last_purchase'] }}</td>

                            <td style="padding:0.875rem 1.25rem;">
                                <a href="#"
                                   style="color:#2563eb; font-size:0.8125rem; font-weight:500; text-decoration:none; white-space:nowrap;"
                                   onmouseover="this.style.color='#1d4ed8'; this.style.textDecoration='underline';"
                                   onmouseout="this.style.color='#2563eb'; this.style.textDecoration='none';"
                                >View Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Empty State -->
                <div id="custEmptyState" style="display:none; text-align:center; padding:3rem 1rem; color:#6b7280; font-size:0.875rem;">
                    No customers found matching your criteria.
                </div>
            </div>
        </div>

        <!-- Row Count -->
        <p id="custRowCount" style="margin-top:0.75rem; font-size:0.75rem; color:#9ca3af;">
            Showing {{ count($customers) }} customer(s)
        </p>

        {{-- =============== END CUSTOMER MANAGEMENT =============== --}}
    </main>
</div>

</body>
</html>

<!-- =============== JS: Search & Filter =============== -->
<script>
    function custToggleFilter(e) {
        e.stopPropagation();
        var drop = document.getElementById('custFilterDrop');
        drop.style.display = (drop.style.display === 'block') ? 'none' : 'block';
    }

    document.addEventListener('click', function () {
        var drop = document.getElementById('custFilterDrop');
        if (drop) drop.style.display = 'none';
    });

    function custFilter() {
        var search = document.getElementById('custSearchInput').value.toLowerCase();
        var cbs    = document.querySelectorAll('#custFilterDrop input[type="checkbox"]');

        var showActive    = cbs[0] ? cbs[0].checked : true;
        var showInactive  = cbs[1] ? cbs[1].checked : true;
        var showHighSpend = cbs[2] ? cbs[2].checked : true;

        var rows    = document.querySelectorAll('#custTableBody tr.cust-row');
        var visible = 0;

        rows.forEach(function (row) {
            var text   = row.innerText.toLowerCase();
            var status = row.dataset.status;
            var total  = parseFloat(row.dataset.total);

            if (status === 'active'   && !showActive)   { row.style.display = 'none'; return; }
            if (status === 'inactive' && !showInactive) { row.style.display = 'none'; return; }
            if (!showHighSpend && total >= 30000)        { row.style.display = 'none'; return; }
            if (search && !text.includes(search))        { row.style.display = 'none'; return; }

            row.style.display = '';
            visible++;
        });

        document.getElementById('custEmptyState').style.display = (visible === 0) ? 'block' : 'none';
        document.getElementById('custRowCount').textContent = 'Showing ' + visible + ' customer(s)';
    }
</script>