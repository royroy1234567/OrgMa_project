<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Management</title>
    @vite(['resources/css/app.css', 'resources/css/inventory.css', 'resources/js/Inventory.js'])
    <style>
        .card { box-shadow: 0 1px 3px rgba(0,0,0,0.08); }

        /* Supplier card */
        .supplier-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 0.75rem;
            padding: 1.25rem;
            margin-bottom: 1rem;
            transition: box-shadow 0.2s;
        }
        .supplier-card:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        /* Create PO button (blue) */
        .btn-create-po {
            background: #2563eb;
            color: #fff;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.55rem 1.1rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }
        .btn-create-po:hover { background: #1d4ed8; }

        /* View Details button (white outline) */
        .btn-view-details {
            background: #fff;
            color: #374151;
            font-size: 0.8rem;
            font-weight: 500;
            padding: 0.4rem 0.9rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            cursor: pointer;
        }
        .btn-view-details:hover { background: #f9fafb; }

        /* Create Order button (blue solid) */
        .btn-create-order {
            background: #2563eb;
            color: #fff;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.4rem 0.9rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
        }
        .btn-create-order:hover { background: #1d4ed8; }

        /* Star icon yellow */
        .star-yellow { color: #facc15; }
    </style>
</head>
<body class="bg-gray-100">

{{-- ─── HEADER ─────────────────────────────────────────── --}}
   <x-header 
    title="Procurement" 
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
            'url' => route('Procurement_Dashboard'),
            'active' => 'Procurement_Dashboard',
            'page' => 'Procurement_Dashboard',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z\' /></svg>'
        ],
        [
            'label' => 'Purchase Orders',
            'url' => route('Procurement_PurchaseOrder'),
            'active' => 'Procurement_PurchaseOrder',
            'page' => 'Procurement_PurchaseOrder',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
        [
            'label' => 'Suppliers',
            'url' => route('Procurement_Supplier'),
            'active' => 'Procurement_Supplier',
            'page' => 'Procurement_Supplier',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
        [
            'label' => 'Reorder Alerts',
            'url' => route('Procurement_ReordersAlert'),
            'active' => 'Procurement_ReordersAlert',
            'page' => 'Procurement_ReordersAlert',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
        [
            'label' => 'Recieving',
            'url' => route('Procurement_ReceivingHistory'),
            'active' => 'Procurement_ReceivingHistory',
            'page' => 'Procurement_ReceivingHistory',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
        [
            'label' => 'Budget',
            'url' => route('Procurement_Budget'),
            'active' => 'Procurement_Budget',
            'page' => 'Procurement_Budget',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
    ]" 
    activePage="{{ request()->route()->getName() === 'Dashboard' ? 'dashboard' : (request()->route()->getName() === 'Products' ? 'products' : 'returns') }}"
    />

    {{-- ─── MAIN CONTENT ──────────────────────────────── --}}
    <main class="flex-1 mt-16 p-6 md:ml-64 transition-all duration-300">

        <!-- ── PAGE HEADING + CREATE PO BUTTON ─────────── -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold text-gray-800">Supplier Management</h2>
            <button class="btn-create-po">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Create PO
            </button>
        </div>

        <!-- ── SUPPLIER CARDS ─────────────────────────────── -->
        @php
            $suppliers = [
                [
                    'name'     => 'Samsung',
                    'contact'  => 'John Doe Smith',
                    'email'    => 'johndoesmith@gmail.com',
                    'phone'    => '+63 987 654 3210',
                    'products' => 3,
                    'rating'   => 4.5,
                ],
                [
                    'name'     => 'Panasonic',
                    'contact'  => 'Harley Santos',
                    'email'    => 'harleysantos@gmail.com',
                    'phone'    => '+63 987 654 3210',
                    'products' => 4,
                    'rating'   => 4.2,
                ],
                [
                    'name'     => 'Astron',
                    'contact'  => 'Federico Pablo',
                    'email'    => 'federicopablo@gmail.com',
                    'phone'    => '+63 987 654 3210',
                    'products' => 10,
                    'rating'   => 4.8,
                ],
            ];
        @endphp

        @foreach ($suppliers as $s)
        <div class="supplier-card">
            <div class="flex items-start justify-between">

                <!-- Left: supplier info -->
                <div class="flex-1">
                    <h3 class="text-base font-bold text-gray-800 mb-1">{{ $s['name'] }}</h3>
                    <p class="text-sm text-gray-600 mb-2">{{ $s['contact'] }}</p>

                    <div class="text-xs text-gray-500 space-y-0.5 mb-3">
                        <p>Email: {{ $s['email'] }}</p>
                        <p>Phone Number: {{ $s['phone'] }}</p>
                    </div>

                    <div class="flex items-center gap-6 text-xs">
                        <!-- Products count -->
                        <div>
                            <span class="text-gray-500">Products</span><br>
                            <span class="font-semibold text-gray-800">{{ $s['products'] }}</span>
                        </div>
                        <!-- Rating -->
                        <div>
                            <span class="text-gray-500">Rating</span><br>
                            <span class="font-semibold text-gray-800 flex items-center gap-1">
                                {{ $s['rating'] }}
                                <svg class="w-3.5 h-3.5 star-yellow" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.77 5.82 22 7 14.14l-5-4.87 6.91-1.01L12 2z"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Right: buttons -->
                <div class="flex flex-col gap-2 ml-4">
                    <button class="btn-view-details">View Details</button>
                    <button class="btn-create-order">Create Order</button>
                </div>
            </div>
        </div>
        @endforeach

    </main>
</div>

</body>
</html>