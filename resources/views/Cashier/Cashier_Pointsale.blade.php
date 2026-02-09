@php
    // Sample products data - replace with your actual database query
    $products = [
        [
            'id' => 1,
            'name' => 'Xiaomi Mi|mee refrigerator',
            'brand' => 'Xiaomi',
            'category' => 'Refrigerator',
            'price' => 29160,
            'original_price' => 29160,
            'discount' => 0,
            'image' => 'https://images.unsplash.com/photo-1571175443880-49e1d25b2bc5?w=200&h=200&fit=crop',
            'stock' => 'NEW',
            'badge' => 'SALE'
        ],
        [
            'id' => 2,
            'name' => 'Astron 1.8L Stainless Steel Electric Kettle',
            'brand' => 'Astron',
            'category' => '1.8L Stainless Steel',
            'price' => 929,
            'original_price' => 1699,
            'discount' => 45,
            'image' => 'https://images.unsplash.com/photo-1564834724105-918b73d1b9e0?w=200&h=200&fit=crop',
            'stock' => 'NEW',
            'badge' => 'SALE'
        ],
        [
            'id' => 3,
            'name' => 'Panasonic NA-F75S1HRM 7.5kg',
            'brand' => 'Panasonic',
            'category' => 'Washing Machine',
            'price' => 12999,
            'original_price' => 15999,
            'discount' => 19,
            'image' => 'https://images.unsplash.com/photo-1626806819282-2c1dc01a5e0c?w=200&h=200&fit=crop',
            'stock' => 'NEW',
            'badge' => 'SALE'
        ],
        [
            'id' => 4,
            'name' => 'Samsung Vision 55" QLED 4K QEFT',
            'brand' => 'Samsung',
            'category' => '55" 4K QLED',
            'price' => 26999,
            'original_price' => 39999,
            'discount' => 33,
            'image' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=200&h=200&fit=crop',
            'stock' => 'NEW',
            'badge' => 'SALE'
        ],
        [
            'id' => 5,
            'name' => 'Samsung Vision 55" Neo QLED Q80MY 4K',
            'brand' => 'Samsung',
            'category' => 'SAMSUNG Q80MY QEFT',
            'price' => 92699,
            'original_price' => 129999,
            'discount' => 29,
            'image' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=200&h=200&fit=crop',
            'stock' => 'NEW',
            'badge' => 'SALE'
        ],
        [
            'id' => 6,
            'name' => 'Panasonic NA-W9S12B',
            'brand' => 'Panasonic',
            'category' => 'TWIN TUB WASHING MACHINE',
            'price' => 8729,
            'original_price' => 10999,
            'discount' => 21,
            'image' => 'https://images.unsplash.com/photo-1626806819282-2c1dc01a5e0c?w=200&h=200&fit=crop',
            'stock' => 'NEW',
            'badge' => 'SALE'
        ],
        [
            'id' => 7,
            'name' => 'Astron Rice cooker',
            'brand' => 'Astron',
            'category' => 'ASTRON RICE COOKER',
            'price' => 640,
            'original_price' => 899,
            'discount' => 29,
            'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=200&h=200&fit=crop',
            'stock' => 'NEW',
            'badge' => 'SALE'
        ],
        [
            'id' => 8,
            'name' => 'Xiaomi Smart Camera C301 360 Image',
            'brand' => 'Xiaomi',
            'category' => '360° Home Security Indoor (Whi',
            'price' => 999,
            'original_price' => 1499,
            'discount' => 33,
            'image' => 'https://images.unsplash.com/photo-1557324232-b8917d3c3dcb?w=200&h=200&fit=crop',
            'stock' => 'NEW',
            'badge' => 'SALE'
        ],
    ];

    // Sample cart items - replace with session data
    $cartItems = [
        [
            'id' => 1,
            'name' => 'Xiaomi Mi|mee refrigerator',
            'price' => 29160,
            'quantity' => 1,
            'image' => 'https://images.unsplash.com/photo-1571175443880-49e1d25b2bc5?w=80&h=80&fit=crop'
        ],
        [
            'id' => 4,
            'name' => 'Samsung Vision 55" QLED 4K QEFT',
            'price' => 26999,
            'quantity' => 1,
            'image' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=80&h=80&fit=crop'
        ],
    ];

    $cartTotal = array_sum(array_map(function($item) {
        return $item['price'] * $item['quantity'];
    }, $cartItems));

    $categories = ['All', 'TCL', 'LG', 'Samsung', 'Panasonic', 'Sony'];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sale</title>
    @vite(['resources/css/app.css','resources/css/inventory.css' , 'resources/js/Inventory.js'])
</head>
<body class="bg-gray-100">
    {{-- Header Component (Full Width at Top) --}}
   <x-header 
    title="Cashier" 
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
            'label' => 'POS',
            'url' => route('Cashier_Pointsale'),
            'active' => 'Cashier_Pointsale',
            'page' => 'Cashier_Pointsale',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z\' /></svg>'
        ],
        [
            'label' => 'Orders',
            'url' => route('Cashier_Order'),
            'active' => 'Cashier_Order',
            'page' => 'Cashier_Order',
            'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
        ],
    ]" 
    activePage="{{ request()->route()->getName() === 'Dashboard' ? 'dashboard' : (request()->route()->getName() === 'Products' ? 'products' : 'returns') }}"
    />

    {{-- Main Content Area --}}
    <main class="flex-1 mt-16 md:ml-64 transition-all duration-300">
        <div class="flex h-[calc(100vh-4rem)]">
            {{-- Products Section --}}
            <div class="flex-1 p-6 overflow-y-auto">
                {{-- Search Bar --}}
                <div class="mb-6">
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" placeholder="Search products..." class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                {{-- Category Filters --}}
                <div class="flex gap-2 mb-6 overflow-x-auto pb-2">
                    @foreach($categories as $category)
                    <button class="px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap transition duration-200 {{ $category === 'All' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                        {{ $category }}
                    </button>
                    @endforeach
                </div>

                {{-- Products Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition duration-200 overflow-hidden cursor-pointer">
                        {{-- Product Image --}}
                        <div class="relative">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover">
                            <div class="absolute top-2 left-2 flex gap-2">
                                <span class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">{{ $product['stock'] }}</span>
                                @if($product['discount'] > 0)
                                <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">{{ $product['badge'] }}</span>
                                @endif
                            </div>
                        </div>

                        {{-- Product Info --}}
                        <div class="p-3">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-0.5 rounded">{{ $product['brand'] }}</span>
                            </div>
                            
                            <h3 class="font-semibold text-sm text-gray-800 mb-1 line-clamp-2 h-10">{{ $product['name'] }}</h3>
                            <p class="text-xs text-gray-500 mb-2">{{ $product['category'] }}</p>

                            {{-- Price --}}
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-lg font-bold text-gray-900">₱{{ number_format($product['price'], 0) }}</span>
                                @if($product['discount'] > 0)
                                <span class="text-xs text-gray-400 line-through">₱{{ number_format($product['original_price'], 0) }}</span>
                                <span class="text-xs font-semibold text-red-500">-{{ $product['discount'] }}%</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Cart Sidebar --}}
            <div class="w-96 bg-white border-l border-gray-200 flex flex-col">
                {{-- Cart Header --}}
                <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Cart ({{ count($cartItems) }})
                    </h2>
                    <button class="text-sm text-blue-600 hover:text-blue-800 font-medium">Clear</button>
                </div>

                {{-- Cart Items --}}
                <div class="flex-1 overflow-y-auto p-4 space-y-3">
                    @foreach($cartItems as $item)
                    <div class="bg-gray-50 rounded-lg p-3 flex gap-3">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded">
                        <div class="flex-1">
                            <h4 class="font-semibold text-sm text-gray-800 mb-1 line-clamp-2">{{ $item['name'] }}</h4>
                            <p class="text-sm font-bold text-blue-600 mb-2">₱{{ number_format($item['price'], 0) }}</p>
                            
                            {{-- Quantity Controls --}}
                            <div class="flex items-center gap-2">
                                <button class="w-6 h-6 bg-gray-200 hover:bg-gray-300 rounded flex items-center justify-center text-gray-700">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                    </svg>
                                </button>
                                <span class="text-sm font-semibold w-8 text-center">{{ $item['quantity'] }}</span>
                                <button class="w-6 h-6 bg-gray-200 hover:bg-gray-300 rounded flex items-center justify-center text-gray-700">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button class="text-red-500 hover:text-red-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                    @endforeach
                </div>

                {{-- Cart Footer --}}
                <div class="border-t border-gray-200 p-4 space-y-3">
                    <div class="flex justify-between items-center text-lg font-bold">
                        <span class="text-gray-700">Total</span>
                        <span class="text-gray-900">₱{{ number_format($cartTotal, 0) }}</span>
                    </div>
                    
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        Checkout (Online Order)
                    </button>
                    
                    <button class="w-full bg-white border-2 border-blue-600 text-blue-600 hover:bg-blue-50 font-semibold py-3 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        Pay Now (Walk-in)
                    </button>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>