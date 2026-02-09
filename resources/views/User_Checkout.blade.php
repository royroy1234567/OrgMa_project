<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    @vite(['resources/css/app.css', 'resources/css/U_Checkout.css'])

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
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Back & Title -->
                <div class="flex items-center gap-3">
                    <a href="{{ url()->previous() }}" class="p-2 hover:bg-gray-100 rounded-full transition-colors">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                    <div class="flex items-center gap-2">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <h1 class="text-2xl font-bold text-gray-900">Checkout</h1>
                    </div>
                </div>

                <!-- Message Icon -->
                <button class="relative p-2 hover:bg-gray-100 rounded-full transition-colors">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-semibold">3</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-3 sm:px-4 py-4 lg:py-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
            
            <!-- Left Column - Order Summary -->
            <div class="space-y-4">
                <!-- Order Summary Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-4 sm:p-4 border-b border-gray-200 flex items-center justify-between">
                        <h2 class="text-lg font-bold text-gray-900">Order Summary</h2>
                        <button class="text-blue-600 hover:text-blue-700 font-semibold text-sm transition-colors">
                            Edit
                        </button>
                    </div>

                    <div class="divide-y divide-gray-100">
                        <!-- Product 1 -->
                        <div class="p-3 sm:p-4 hover:bg-gray-50/50 transition-colors">
                            <div class="flex gap-3">
                                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-100 rounded-lg flex items-center justify-center shrink-0 border border-gray-200">
                                    <img src="{{ asset('images/Panasonic_closet.jpg') }}" alt="Panasonic HCC-R340ARXP" class="w-full h-full object-contain p-1">
                                </div>

                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between gap-3 mb-1">
                                        <div class="flex-1 min-w-0">
                                            <div class="text-xs font-semibold text-gray-500 mb-0.5 uppercase tracking-wide">Panasonic</div>
                                            <h3 class="text-sm sm:text-base font-bold text-gray-900 mb-0.5 leading-tight">Panasonic HCC-R340ARXP</h3>
                                            <p class="text-xs text-gray-600 mb-1">Smart Closet CARE+ Edition</p>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-base sm:text-lg font-bold text-gray-900">₱89,999</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="px-2 py-0.5 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full border border-blue-200">Sale</span>
                                        <span class="px-2 py-0.5 bg-purple-100 text-purple-700 text-xs font-semibold rounded-full border border-purple-200">2024</span>
                                        <span class="ml-auto text-xs font-semibold text-gray-600">×1</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 2 -->
                        <div class="p-3 sm:p-4 hover:bg-gray-50/50 transition-colors">
                            <div class="flex gap-3">
                                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-100 rounded-lg flex items-center justify-center shrink-0 border border-gray-200">
                                    <img src="{{ asset('images/headset.jpg') }}" alt="SONY ULT Power Sound Series" class="w-full h-full object-contain p-1">
                                </div>

                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between gap-3 mb-1">
                                        <div class="flex-1 min-w-0">
                                            <div class="text-xs font-semibold text-gray-500 mb-0.5 uppercase tracking-wide">Sony</div>
                                            <h3 class="text-sm sm:text-base font-bold text-gray-900 mb-0.5 leading-tight">SONY ULT Power Sound Series</h3>
                                            <p class="text-xs text-gray-600 mb-1">ULT Tower 10 Party Speaker</p>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-base sm:text-lg font-bold text-gray-900">₱52,199</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="px-2 py-0.5 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full border border-blue-200">Sale</span>
                                        <span class="px-2 py-0.5 bg-purple-100 text-purple-700 text-xs font-semibold rounded-full border border-purple-200">2024</span>
                                        <span class="ml-auto text-xs font-semibold text-gray-600">×2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Items -->
                    <div class="p-3 sm:p-4 bg-gray-50 border-t border-gray-100">
                        <div class="flex items-center justify-between">
                            <span class="text-sm sm:text-base font-semibold text-gray-700">Total Item(s):</span>
                            <div class="text-right">
                                <span class="text-xs text-gray-600 font-medium">(×3)</span>
                                <span class="text-lg sm:text-xl font-bold text-gray-900 ml-2">₱194,397</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Delivery & Payment -->
            <div class="space-y-4">
                <!-- Delivery Address Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex items-start justify-between mb-1">
                                    <div>
                                        <h3 class="text-sm font-bold text-gray-900">John D. Doe</h3>
                                        <p class="text-xs text-gray-600">(+63) 987 654 3210</p>
                                    </div>
                                    <button class="text-blue-600 hover:text-blue-700 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-xs text-gray-700 leading-relaxed">
                                    Blk 00 Lot 00 Python St. Monty Village, Espania, Brgy 000, Manila
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Discount Code Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-4">
                        <div class="flex gap-2">
                            <input 
                                type="text" 
                                placeholder="Enter Discount code or gift card"
                                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-xs transition-all"
                            >
                            <button class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg transition-all hover:shadow-lg">
                                Apply
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Payment Method Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-bold text-gray-900">Payment Method</h3>
                            <span class="px-2.5 py-1 bg-amber-100 text-amber-700 text-xs font-semibold rounded-full border border-amber-200">
                                Cash on Delivery
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Payment Details Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-4">
                        <h3 class="text-base font-bold text-gray-900 mb-3">Payment Details</h3>
                        
                        <div class="space-y-2">
                            <div class="flex items-center justify-between py-1">
                                <span class="text-xs text-gray-700">Merchandise Subtotal</span>
                                <span class="text-sm font-semibold text-gray-900">₱194,397</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <span class="text-xs text-gray-700">Merchandise Discount</span>
                                <span class="text-sm font-semibold text-gray-900">0</span>
                            </div>
                            <div class="flex items-center justify-between py-1 pb-2 border-b border-gray-200">
                                <span class="text-xs text-gray-700">Shipping Subtotal</span>
                                <span class="text-sm font-semibold text-gray-900">₱300</span>
                            </div>
                            
                            <div class="flex items-center justify-between py-2 bg-blue-50 -mx-4 px-4 rounded-lg border border-blue-100">
                                <span class="text-sm font-bold text-gray-900">Total Payment:</span>
                                <span class="text-xl font-bold text-blue-600">₱194,697</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Place Order Button -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden sticky bottom-4">
                    <div class="p-4">
                        <div class="flex items-center justify-between gap-3">
                            <div class="text-left">
                                <div class="text-xs text-gray-600 font-medium">Total</div>
                                <div class="text-lg font-bold text-gray-900">₱194,697</div>
                            </div>
                            <button 
                                onclick="showOrderModal()"
                                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-lg transition-all shadow-lg hover:shadow-xl"
                            >
                                Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Order Confirmation Modal -->
    <div id="orderModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <!-- Backdrop -->
        <div class="modal-backdrop fixed inset-0 bg-black/60 backdrop-blur-sm"></div>
        
        <!-- Modal Content -->
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="modal-content relative bg-white rounded-3xl shadow-2xl max-w-md w-full overflow-hidden">
                
                <!-- Success Icon -->
                <div class="p-8 pb-6 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-green-600 rounded-full mb-6">
                        <svg class="w-24 h-24" viewBox="0 0 52 52">
                            <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none" stroke="white" stroke-width="2"/>
                            <path class="checkmark-check" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                    </div>
                    
                    <h2 class="text-3xl  font-bold text-gray-900 mb-3">Order Confirmed!</h2>
                    <p class="text-gray-600 text-base leading-relaxed mb-6">
                        Your order has been successfully placed. We'll send you a confirmation email shortly.
                    </p>
                    
                    <!-- Order Details -->
                    <div class="bg-gray-50 rounded-2xl p-5 mb-6 border border-gray-200 text-left">
                        <div class="flex items-center justify-between mb-3 pb-3 border-b border-gray-200">
                            <span class="text-sm text-gray-600 font-medium">Order Number</span>
                            <span class="text-sm font-bold text-gray-900">#ORD-2024-001</span>
                        </div>
                        <div class="flex items-center justify-between mb-3 pb-3 border-b border-gray-200">
                            <span class="text-sm text-gray-600 font-medium">Total Items</span>
                            <span class="text-sm font-bold text-gray-900">3 items</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 font-medium">Total Amount</span>
                            <span class="text-xl  font-bold text-blue-600">₱194,697</span>
                        </div>
                    </div>
                    
                    <!-- Estimated Delivery -->
                    <div class="bg-blue-50 rounded-xl p-4 mb-6 border border-blue-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="text-left flex-1">
                                <div class="text-xs text-blue-700 font-semibold mb-0.5">Estimated Delivery</div>
                                <div class="text-sm font-bold text-blue-900">3-5 Business Days</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <button 
                        onclick="closeOrderModal()"
                        class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-lg transition-all"
                    >
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showOrderModal() {
            const modal = document.getElementById('orderModal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeOrderModal() {
            const modal = document.getElementById('orderModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal on backdrop click
        document.getElementById('orderModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeOrderModal();
            }
        });

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeOrderModal();
            }
        });
    </script>

    <script>
        function showOrderModal() {
            const modal = document.getElementById('orderModal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeOrderModal() {
            const modal = document.getElementById('orderModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal on backdrop click
        document.getElementById('orderModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeOrderModal();
            }
        });

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeOrderModal();
            }
        });
    </script>

</body>
</html>