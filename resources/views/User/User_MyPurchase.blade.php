<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    @vite(['resources/css/app.css'])
</head>

<body  class="bg-gray-100">

<nav class="bg-[#004AAD] rounded-b-2xl">
  <div class="container mx-auto px-4 py-2 flex items-center justify-between">

    <!-- LEFT: Logo -->
    <div class="flex items-center gap-2">
      <img src="{{ asset('images/HOME_CENTER1.png') }}" class="w-10 h-10 sm:w-13 sm:h-13 rounded-full" alt="Logo">
    </div>

    <!-- CENTER: Search -->
    <div class="flex-1 mx-2 sm:mx-4 md:mx-8 relative">
      <input
        type="text"
        placeholder="Search..."
        class="w-full px-3 sm:px-4 py-2 pr-10 sm:pr-12 rounded-full text-sm sm:text-base
               bg-[#2D60A6] text-white placeholder-white
               focus:bg-white focus:text-black
               focus:placeholder-gray-400
               focus:outline-none focus:ring-2 focus:ring-white"
      />
      <img src="{{ asset('images/search1.png') }}"
           class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 w-4 h-4 pointer-events-none"
           alt="Search Icon"/>
    </div>

    <!-- RIGHT: Desktop Links -->
    <div class="hidden md:flex items-center gap-6 mr-4">
        <img src="{{ asset('images/User_one.png') }}" class="w-8 h-8 rounded-full">
     
      <a href="/User_Cart" class="flex items-center gap-2 text-white font-medium hover:text-gray-300">
        <img src="{{ asset('images/grocery-store1.png') }}" class="w-6 h-6">
        Cart
      </a>  
    </div>

    <!-- Burger Menu (Mobile) -->
    <button id="burgerBtn" class="md:hidden flex items-center">
      <img src="{{ asset('images/burgermenu.png') }}" class="w-6 h-6 sm:w-7 sm:h-7" alt="Menu">
    </button>
  </div>

  <!-- MOBILE MENU -->
  <div id="mobileMenu" class="md:hidden overflow-hidden">
    <div class="flex flex-col gap-4 px-6 py-4 bg-[#003d8f]">
      <a href="#" class="flex items-center gap-2 text-white hover:bg-[#2D60A6] p-2 rounded-lg transition">
        <img src="{{ asset('images/user1.png') }}" class="w-6 h-6">
        Log In
      </a>

      <a href="# class="flex items-center gap-2 text-white hover:bg-[#2D60A6] p-2 rounded-lg transition">
        <img src="{{ asset('images/grocery-store1.png') }}" class="w-6 h-6">
        Cart
      </a>
    </div>
  </div>
</nav>

    <!-- Main Content -->

    <!-- Back -->
      <div class="md:flex items-center gap-6 mr-4 py-5 px-10">
        <a href="/" class="flex items-center text-blue-800 font-bold hover:text-blue-600">
          <img src="{{ asset('images/left-arrow.png') }}" class="w-5 h-5">
        Back
        </a>
      </div>

    <div class="container mx-auto max-w-7xl p-6">
        <!-- Profile Header -->
        <div class="flex items-start justify-between mb-6">
            <div class="flex items-center gap-4">
                <img 
                    src="{{asset('images/User_one.png')}}" 
                    alt="Profile Picture" 
                    class="w-30 h-30 rounded-full border-3 border-blue-900 shadow-lg"
                />
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">{{ $user['name'] }}</h1>
                    <p class="text-gray-600">Age: {{ $user['age'] }}</p>
                </div>
            </div>
            <form method="POST" action="#">
                @csrf
                <button type="submit" class="flex items-center gap-2 text-red-600 hover:text-red-700 font-medium mt-15">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>

         <!-- Tabs -->
        <div class="flex gap-4 mb-6">
            <a href="./User_Profile" class="px-6 py-2 text-gray-700 hover:text-gray-900 font-medium">
                Profile
            </a>
            <a href="/User_MyPurchase" class="px-6 py-2 bg-blue-700 border-3 border-blue-900 text-white rounded-full font-medium">
                My Purchase
            </a>
            <a href="./User_OrderHistory" class="px-6 py-2.5 text-gray-700 hover:text-gray-900 font-medium">
                Order History
            </a>
        </div>

        <!-- Status Tabs -->
        <div class="bg-blue-100 rounded-lg p-2 mb-6">
            <div class="grid grid-cols-4 gap-2">
                <!-- To Pay -->
                <a href="?status=to-pay" class="flex flex-row items-center justify-center gap-2 bg-blue-100 {{ request('status', 'to-pay') === 'to-pay' ? 'border-b-2 border-blue-600' : 'hover:bg-blue-200' }}">
                    <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 30 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="text-sm font-medium {{ request('status', 'to-pay') === 'to-pay' ? 'text-gray-800' : 'text-gray-700' }}">To Pay</span>
                </a>

                <!-- To Ship -->
                <a href="?status=to-ship" class="flex flex-row items-center justify-center gap-2 bg-blue-100 {{ request('status') === 'to-ship' ? 'border-b-2 border-blue-600' : 'hover:bg-blue-200' }}">
                    <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 30 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700">To Ship</span>
                </a>

                <!-- To Receive -->
                <a href="?status=to-receive" class="flex flex-row items-center justify-center gap-2 bg-blue-100 {{ request('status') === 'to-receive' ? 'border-b-2 border-blue-600' : 'hover:bg-blue-200' }}">
                    <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 30 24"> 
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700">To Receive</span>
                </a>
 
                <!-- To Rate -->
                <a href="?status=to-rate" class="flex flex-row items-center justify-center gap-2 bg-blue-100 {{ request('status') === 'to-rate' ? 'border-b-2 border-blue-600' : 'hover:bg-blue-200' }}">
                    <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 30 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700">To Rate</span>
                </a>
            </div>
        </div>

        <!-- Purchase Items List -->
        @forelse($purchases as $purchase)
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-4">
            <!-- Card Header -->
            <div class="flex items-center justify-between px-6 py-3">
                <div class="flex items-center gap-2">
                </div>
                <span class="text-blue-700 font-medium">{{ $purchase['status'] }}</span>
            </div>

            <!-- Product Details -->
            <div class="p-6">
                <div class="flex gap-6">
                    <!-- Product Image -->
                    <div class="shrink-0">
                        <img 
                            src="{{ $purchase['product_image'] }}" 
                            alt="{{ $purchase['product_name'] }}" 
                            class="w-28 h-28 object-cover rounded-lg"
                        />
                    </div>

                    <!-- Product Info -->
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $purchase['product_name'] }}</h3>
                        <p class="text-gray-600 text-sm mb-2">
                            {{ $purchase['product_description'] }}
                        </p>
                        <p class="text-gray-500 text-sm">Qty: x{{ $purchase['quantity'] }}</p>
                    </div>

                    <!-- Price and Action -->
                    <div class="flex flex-col items-end justify-between">
                        <p class="text-2xl font-bold text-gray-800">₱{{ number_format($purchase['price'], 0) }}</p>
                        <a href="#" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium">
                            Contact Seller
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="bg-white rounded-lg shadow-sm p-12 text-center">
            <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">No purchases found</h3>
            <p class="text-gray-500">You don't have any purchases in this category yet.</p>
        </div>
        @endforelse
    </div>


</body>
</html>