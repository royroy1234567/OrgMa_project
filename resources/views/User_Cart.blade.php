<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100">
    
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
     
      <a href="./U_Cart" class="flex items-center gap-2 text-white font-medium hover:text-gray-300">
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
  <div id="mobileMenu" class="hidden flex-col gap-4 px-6 py-4 md:hidden">
    <a href="#" class="flex items-center gap-2 text-white">
      <img src="{{ asset('images/user1.png') }}" class="w-6 h-6">
      Log In
    </a>

    <a href="#" class="flex items-center gap-2 text-white">
      <img src="{{ asset('images/grocery-store1.png') }}" class="w-6 h-6">
      Cart
    </a>
  </div>
</nav>

<!-- Header -->
<header class="bg-white border-b border-gray-200 px-3 sm:px-4 py-2.5 sm:py-3">
    <div class="max-w-7xl mx-auto">
        <!-- Mobile Header -->
        <div class="md:hidden flex items-center justify-between">
            <div class="flex items-center gap-2">
                <!-- Back Button -->
                <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-800">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                
                <!-- Shopping Cart Title -->
                <div class="flex items-center gap-1.5 sm:gap-2">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <h1 class="text-base sm:text-lg font-semibold text-gray-800">Shopping Cart</h1>
                </div>
            </div>

            <!-- Message Icon (Mobile) -->
            <button class="relative text-gray-600 hover:text-gray-800">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
            </button>
        </div>

        <!-- Desktop Header -->
        <div class="hidden md:flex items-center justify-between">
            <div class="flex items-center gap-4">
                <!-- Back Button -->
                <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                
                <!-- Shopping Cart Title -->
                <div class="flex items-center gap-2">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <h1 class="text-xl font-semibold text-gray-800">Shopping Cart</h1>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <!-- Search Bar -->
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Search cart products..." 
                        class="w-48 lg:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                    >
                    <svg class="w-5 h-5 text-gray-400 absolute right-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <!-- Edit Button -->
                <button class="text-gray-600 hover:text-gray-800 font-medium text-sm lg:text-base">
                    Edit
                </button>

                <!-- Message Icon -->
                <button class="relative text-gray-600 hover:text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-3 sm:px-4 py-3 sm:py-4 md:py-6">
    <!-- Cart Items -->
    <div class="space-y-2 sm:space-y-3">
        <!-- Product 1 - Panasonic HCC-R340ARXP -->
        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 md:p-6">
            <!-- Mobile Layout (< 640px) -->
            <div class="sm:hidden">
                <div class="flex gap-2.5 mb-2.5">
                    <input type="checkbox" class="w-4 h-4 sm:w-5 sm:h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mt-0.5 shrink-0">
                    
                    <!-- Product Image -->
                    <div class="w-16 h-16 xs:w-20 xs:h-20 bg-gray-50 rounded-lg flex items-center justify-center shrink-0">
                        <img src="{{ asset('images/panasonic_closet.jpg') }}" alt="Panasonic HCC-R340ARXP" class="w-full h-full object-contain p-1.5">
                    </div>

                    <!-- Product Info -->
                    <div class="flex-1 min-w-0">
                        <div class="text-xs font-semibold text-gray-500 mb-0.5">Panasonic</div>
                        <h3 class="text-sm font-semibold text-gray-800 line-clamp-2 mb-0.5 leading-tight">Panasonic HCC-R340ARXP</h3>
                        <p class="text-xs text-gray-500 line-clamp-1">Smart Closet CARE+ Edition</p>
                    </div>
                </div>

                <!-- Tags -->
                <div class="flex gap-1.5 mb-2.5 ml-5">
                    <span class="px-2 py-0.5 bg-gray-200 text-gray-700 text-xs font-medium rounded">Sale</span>
                    <span class="px-2 py-0.5 bg-gray-200 text-gray-700 text-xs font-medium rounded">2024</span>
                </div>

                <!-- Price and Quantity -->
                <div class="flex items-center justify-between ml-5">
                    <div class="text-lg xs:text-xl font-bold text-gray-800">₱89,999</div>
                    
                    <!-- Quantity Controls -->
                    <div class="flex items-center gap-1 border border-gray-300 rounded-lg">
                        <button class="px-2 py-1 text-gray-600 hover:bg-gray-50 text-base">-</button>
                        <span class="px-2.5 py-1 font-medium text-gray-800 text-sm min-w-8 text-center">1</span>
                        <button class="px-2 py-1 text-gray-600 hover:bg-gray-50 text-base">+</button>
                    </div>
                </div>
            </div>

            <!-- Tablet & Desktop Layout (>= 640px) -->
            <div class="hidden sm:flex items-center gap-3 md:gap-6">
                <input type="checkbox" class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 shrink-0">
                
                <!-- Product Image -->
                <div class="w-20 h-20 md:w-24 md:h-24 bg-gray-50 rounded-lg flex items-center justify-center shrink-0">
                    <img src="{{ asset('images/panasonic_closet.jpg') }}" alt="Panasonic HCC-R340ARXP" class="w-full h-full object-contain p-2">
                </div>

                <!-- Product Details -->
                <div class="flex-1 min-w-0">
                    <div class="text-xs font-semibold text-gray-500 mb-1">Panasonic</div>
                    <h3 class="text-base md:text-lg font-semibold text-gray-800 mb-1 truncate">Panasonic HCC-R340ARXP</h3>
                    <p class="text-xs md:text-sm text-gray-500 mb-2 truncate">Smart Closet CARE+ Edition</p>
                    <div class="flex gap-2">
                        <span class="px-2 md:px-3 py-1 bg-gray-200 text-gray-700 text-xs font-medium rounded">Sale</span>
                        <span class="px-2 md:px-3 py-1 bg-gray-200 text-gray-700 text-xs font-medium rounded">2024</span>
                    </div>
                </div>

                <!-- Price and Quantity -->
                <div class="flex flex-col items-end gap-3 md:gap-4 shrink-0">
                    <div class="text-xl md:text-2xl font-bold text-gray-800">₱89,999</div>
                    
                    <!-- Quantity Controls -->
                    <div class="flex items-center gap-2 border border-gray-300 rounded-lg">
                        <button class="px-3 py-1.5 md:py-2 text-gray-600 hover:bg-gray-50 text-sm">-</button>
                        <span class="px-3 md:px-4 py-1.5 md:py-2 font-medium text-gray-800 text-sm min-w-10 text-center">1</span>
                        <button class="px-3 py-1.5 md:py-2 text-gray-600 hover:bg-gray-50 text-sm">+</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product 2 - SONY ULT Power Sound Series -->
        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 md:p-6">
            <!-- Mobile Layout (< 640px) -->
            <div class="sm:hidden">
                <div class="flex gap-2.5 mb-2.5">
                    <input type="checkbox" class="w-4 h-4 sm:w-5 sm:h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mt-0.5 shrink-0">
                    
                    <!-- Product Image -->
                    <div class="w-16 h-16 xs:w-20 xs:h-20 bg-gray-50 rounded-lg flex items-center justify-center shrink-0">
                        <img src="{{ asset('images/headset.jpg') }}" alt="SONY ULT Power Sound Series" class="w-full h-full object-contain p-1.5">
                    </div>

                    <!-- Product Info -->
                    <div class="flex-1 min-w-0">
                        <div class="text-xs font-semibold text-gray-500 mb-0.5">SONY</div>
                        <h3 class="text-sm font-semibold text-gray-800 line-clamp-2 mb-0.5 leading-tight">SONY ULT Power Sound Series</h3>
                        <p class="text-xs text-gray-500 line-clamp-1">ULT Tower 10 Party Speaker</p>
                    </div>
                </div>

                <!-- Tags -->
                <div class="flex gap-1.5 mb-2.5 ml-5">
                    <span class="px-2 py-0.5 bg-gray-200 text-gray-700 text-xs font-medium rounded">Sale</span>
                    <span class="px-2 py-0.5 bg-gray-200 text-gray-700 text-xs font-medium rounded">2024</span>
                </div>

                <!-- Price and Quantity -->
                <div class="flex items-center justify-between ml-5">
                    <div class="text-lg xs:text-xl font-bold text-gray-800">₱52,199</div>
                    
                    <!-- Quantity Controls -->
                    <div class="flex items-center gap-1 border border-gray-300 rounded-lg">
                        <button class="px-2 py-1 text-gray-600 hover:bg-gray-50 text-base">-</button>
                        <span class="px-2.5 py-1 font-medium text-gray-800 text-sm min-w-8 text-center">2</span>
                        <button class="px-2 py-1 text-gray-600 hover:bg-gray-50 text-base">+</button>
                    </div>
                </div>
            </div>

            <!-- Tablet & Desktop Layout (>= 640px) -->
            <div class="hidden sm:flex items-center gap-3 md:gap-6">
                <input type="checkbox" class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 shrink-0">
                
                <!-- Product Image -->
                <div class="w-20 h-20 md:w-24 md:h-24 bg-gray-50 rounded-lg flex items-center justify-center shrink-0">
                    <img src="{{ asset('images/headset.jpg') }}" alt="SONY ULT Power Sound Series" class="w-full h-full object-contain p-1">
                </div>

                <!-- Product Details -->
                <div class="flex-1 min-w-0">
                    <div class="text-xs font-semibold text-gray-500 mb-1">SONY</div>
                    <h3 class="text-base md:text-lg font-semibold text-gray-800 mb-1 truncate">SONY ULT Power Sound Series</h3>
                    <p class="text-xs md:text-sm text-gray-500 mb-2 truncate">ULT Tower 10 Party Speaker</p>
                    <div class="flex gap-2">
                        <span class="px-2 md:px-3 py-1 bg-gray-200 text-gray-700 text-xs font-medium rounded">Sale</span>
                        <span class="px-2 md:px-3 py-1 bg-gray-200 text-gray-700 text-xs font-medium rounded">2024</span>
                    </div>
                </div>

                <!-- Price and Quantity -->
                <div class="flex flex-col items-end gap-3 md:gap-4 shrink-0">
                    <div class="text-xl md:text-2xl font-bold text-gray-800">₱52,199</div>
                    
                    <!-- Quantity Controls -->
                    <div class="flex items-center gap-2 border border-gray-300 rounded-lg">
                        <button class="px-3 py-1.5 md:py-2 text-gray-600 hover:bg-gray-50 text-sm">-</button>
                        <span class="px-3 md:px-4 py-1.5 md:py-2 font-medium text-gray-800 text-sm min-w-10 text-center">2</span>
                        <button class="px-3 py-1.5 md:py-2 text-gray-600 hover:bg-gray-50 text-sm">+</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Spacer for fixed bottom bar -->
    <div class="h-24 sm:h-28"></div>
</main>

<!-- Fixed Bottom Checkout Bar -->
<div class="fixed bottom-0 left-0 right-0 bg-white border-t-2 border-gray-200 shadow-lg z-50">
    <div class="max-w-7xl mx-auto px-3 sm:px-4 py-2.5 sm:py-3 md:py-4">
        <!-- Mobile Layout -->
        <div class="sm:hidden">
            <div class="flex items-center justify-between mb-2.5">
                <div class="flex items-center gap-2">
                    <input type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label class="font-medium text-gray-700 text-sm">All</label>
                </div>

                <div class="flex items-center gap-0.5">
                    <span class="text-gray-600 text-sm">Total:</span>
                    <span class="text-gray-600 text-sm">₱</span>
                    <span class="text-xl font-bold text-gray-800">0</span>
                </div>
            </div>
            
            <button class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors shadow-md text-sm">
                Check Out (0)
            </button>
        </div>

        <!-- Tablet & Desktop Layout -->
        <div class="hidden sm:flex items-center justify-between">
            <!-- Select All Checkbox -->
            <div class="flex items-center gap-3">
                <input type="checkbox" class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <label class="font-medium text-gray-700 text-sm md:text-base">All</label>
            </div>

            <!-- Total and Checkout -->
            <div class="flex items-center gap-3 md:gap-6">
                <div class="flex items-center gap-1.5">
                    <span class="text-gray-600 text-sm md:text-base">Total:</span>
                    <span class="text-gray-600 text-sm md:text-base">₱</span>
                    <span class="text-2xl md:text-3xl font-bold text-gray-800">0</span>
                </div>
                
                <a href="{{ url('/User_Checkout') }}" class="px-6 sm:px-8 md:px-12 py-2.5 md:py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors shadow-md inline-block text-sm md:text-base">
                    Check Out (0)
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    // Burger menu toggle
    const burgerBtn = document.getElementById('burgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    burgerBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('flex');
    });

    // Add interactivity for quantity controls
    document.querySelectorAll('.flex.items-center.gap-1.border, .flex.items-center.gap-2.border').forEach(control => {
        const minusBtn = control.querySelector('button:first-child');
        const plusBtn = control.querySelector('button:last-child');
        const quantitySpan = control.querySelector('span');
        
        minusBtn.addEventListener('click', () => {
            let qty = parseInt(quantitySpan.textContent);
            if (qty > 1) {
                quantitySpan.textContent = qty - 1;
            }
        });
        
        plusBtn.addEventListener('click', () => {
            let qty = parseInt(quantitySpan.textContent);
            quantitySpan.textContent = qty + 1;
        });
    });
</script>

</body>
</html>