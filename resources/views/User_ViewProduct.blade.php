<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>

    @vite(['resources/css/app.css'])
    
    <style>
        :root {
            --color-primary: #2563eb;
            --color-accent: #f59e0b;
            --color-surface: #fafafa;
            --color-text: #0f172a;
        }
        
        * {
            font-family: 'Manrope', sans-serif;
        }
        
        .product-nav {
            font-family: 'Space Mono', monospace;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .badge {
            font-family: 'Space Mono', monospace;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        
        .product-image-wrapper {
            position: relative;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 1rem;
            overflow: hidden;
        }
        
        .product-image-wrapper::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.05) 0%, transparent 70%);
            animation: pulse 8s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(5deg); }
        }
        
        .feature-chip {
            background: rgba(37, 99, 235, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(37, 99, 235, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .feature-chip:hover {
            background: rgba(37, 99, 235, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.15);
        }
        
        .section-header {
            position: relative;
            padding-left: 1rem;
        }
        
        .section-header::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(180deg, var(--color-primary) 0%, var(--color-accent) 100%);
            border-radius: 2px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-outline {
            border: 2px solid var(--color-primary);
            color: var(--color-primary);
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            background: var(--color-primary);
            color: white;
        }
        
        .review-bar {
            height: 6px;
            background: #e5e7eb;
            border-radius: 3px;
            overflow: hidden;
            position: relative;
        }
        
        .review-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--color-accent) 0%, #f59e0b 100%);
            transition: width 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .product-card {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }
        
        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
            border-color: var(--color-primary);
        }
        
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--color-primary);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }

        /* Mobile menu animation */
        #mobileMenu {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        #mobileMenu.show {
            max-height: 300px;
            opacity: 1;
        }
    </style>
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

    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-8">
                    <a href="#" class="text-2xl font-bold bg-linear-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">STORE</a>
                    <div class="hidden md:flex space-x-6 product-nav">
                        <a href="#" class="nav-link text-gray-700 hover:text-blue-600">Best Deals</a>
                        <a href="#" class="nav-link text-gray-700 hover:text-blue-600">Collections</a>
                        <a href="#" class="nav-link text-gray-700 hover:text-blue-600">TV</a>
                        <a href="#" class="nav-link text-gray-700 hover:text-blue-600">Washer</a>
                        <a href="#" class="nav-link text-gray-700 hover:text-blue-600">Oven & Microwave</a>
                        <a href="#" class="nav-link text-gray-700 hover:text-blue-600">Refrigerator</a>
                        <a href="#" class="nav-link text-gray-700 hover:text-blue-600">Air Coolers</a>
                        <a href="#" class="nav-link text-gray-700 hover:text-blue-600">Parts</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="p-2 hover:bg-gray-100 rounded-full transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                    <button class="p-2 hover:bg-gray-100 rounded-full transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </button>
                    <button class="p-2 hover:bg-gray-100 rounded-full transition relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm mb-6 product-nav">
            <a href="/" class="text-gray-500 hover:text-blue-600 transition">Home</a>
            <span class="text-gray-400">/</span>
            <a href="#" class="text-gray-500 hover:text-blue-600 transition">All Products</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-900 font-semibold">Fujidenzo RHU022 MB</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
            <!-- Product Images -->
            <div class="space-y-4">
                <div class="product-image-wrapper aspect-square flex items-center justify-center p-8">
                    <img src="{{ asset('images/panasonic_closet.jpg') }}" alt="Panasonic HCC-R340ARXP" class="w-full h-full object-contain p-2">
                </div>
                <div class="grid grid-cols-4 gap-3">
                    @for ($i = 0; $i < 4; $i++)
                    <button class="aspect-square bg-gray-100 rounded-lg border-2 border-gray-200 hover:border-blue-500 transition overflow-hidden p-2">
                        <img src="{{ asset('images/panasonic_closet.jpg') }}" alt="Panasonic HCC-R340ARXP" class="w-full h-full object-contain p-2">
                    </button>
                    @endfor
                </div>
            </div>

            <!-- Product Details -->
            <div class="space-y-6">
                <div>
                    <span class="badge inline-block px-3 py-1 bg-green-100 text-green-700 rounded-full mb-3">✓ Available in stock</span>
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">Fujidenzo RHU022 MB</h1>
                    <p class="text-gray-600">SKU: RH-FD-22-002</p>
                </div>

                <!-- Price -->
                <div class="flex items-baseline space-x-3">
                    <span class="text-5xl font-bold text-gray-900">₱36,999</span>
                    <span class="text-2xl text-gray-400 line-through">₱42,000</span>
                    <span class="badge px-3 py-1 bg-red-100 text-red-700 rounded-full">-12% OFF</span>
                </div>

                <!-- Color Selection -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Color: Matte Black</label>
                    <div class="flex space-x-3">
                        <button class="w-12 h-12 rounded-full bg-gray-900 border-4 border-blue-500 shadow-lg"></button>
                        <button class="w-12 h-12 rounded-full bg-gray-300 border-2 border-gray-300 hover:border-gray-400 transition"></button>
                    </div>
                </div>

                <!-- Quantity & Actions -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Quantity</label>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center border-2 border-gray-300 rounded-lg overflow-hidden">
                                <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 transition">−</button>
                                <input type="number" value="1" class="w-16 text-center border-0 focus:ring-0 font-semibold">
                                <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 transition">+</button>
                            </div>
                            <span class="text-sm text-gray-600">Only <span class="font-bold text-orange-600">12 items</span> left!</span>
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        <button class="btn-outline flex-1 px-6 py-3 rounded-lg font-semibold">Add to Cart</button>
                        <button class="btn-primary flex-1 px-6 py-3 rounded-lg font-semibold text-white relative z-10">Buy Now</button>
                    </div>
                </div>

                <!-- Specifications Chips -->
                <div class="border-t pt-6">
                    <h3 class="text-sm font-semibold text-gray-700 mb-3">SUPER TOUGH / ENERGY EFFICIENT / DESIGN FIT</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="feature-chip px-4 py-2 rounded-full text-sm font-medium">2.2L</span>
                        <span class="feature-chip px-4 py-2 rounded-full text-sm font-medium">CABINET LOCK</span>
                        <span class="feature-chip px-4 py-2 rounded-full text-sm font-medium">LOW (3)</span>
                        <span class="feature-chip px-4 py-2 rounded-full text-sm font-medium">STANDARD 2L</span>
                        <span class="feature-chip px-4 py-2 rounded-full text-sm font-medium">STAINLESS STEEL</span>
                        <span class="feature-chip px-4 py-2 rounded-full text-sm font-medium">YES</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Features -->
        <section class="mb-12">
            <h2 class="section-header text-2xl font-bold mb-6">Product Features</h2>
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200">
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-3 mt-1">▸</span>
                        <span>Oven Toaster Oven</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-3 mt-1">▸</span>
                        <span>Capacity: 22 Liters</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-3 mt-1">▸</span>
                        <span>Timer (60 Minutes)</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-3 mt-1">▸</span>
                        <span>Rotisserie Function</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-3 mt-1">▸</span>
                        <span>With Built-in Light</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-3 mt-1">▸</span>
                        <span>Double Glass Door</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-3 mt-1">▸</span>
                        <span>Stainless Steel Housing</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-3 mt-1">▸</span>
                        <span>Black Color Finish</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-3 mt-1">▸</span>
                        <span>Wire Rack Included</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-3 mt-1">▸</span>
                        <span>Baking Tray Included</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-3 mt-1">▸</span>
                        <span>Crumb Tray Included</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-3 mt-1">▸</span>
                        <span>Tong / Grip Handle</span>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Overview -->
        <section class="mb-12">
            <h2 class="section-header text-2xl font-bold mb-6">Overview</h2>
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200 prose max-w-none">
                <p class="text-gray-700 leading-relaxed">
                    Introducing the Fujidenzo RHU022 MB Oven Toaster - your ultimate kitchen companion for versatile cooking! 
                    With a generous 22-liter capacity, this sleek matte black oven toaster is designed to handle all your baking, 
                    toasting, and roasting needs with ease. Whether you're preparing a family meal or experimenting with new recipes, 
                    the RHU022 MB delivers consistent results every time.
                </p>
                <p class="text-gray-700 leading-relaxed mt-4">
                    Equipped with a convenient rotisserie function, you can achieve perfectly roasted chicken and meats with minimal 
                    effort. The built-in light allows you to monitor your cooking progress without opening the door, ensuring optimal 
                    heat retention. The double glass door not only enhances safety but also provides excellent insulation for energy-efficient cooking.
                </p>
                <p class="text-gray-700 leading-relaxed mt-4">
                    The stainless steel housing ensures durability and easy maintenance, while the included accessories - wire rack, 
                    baking tray, crumb tray, and tong/grip handle - make this oven toaster a complete cooking solution right out of the box.
                </p>
            </div>
        </section>

        <!-- What's In The Box -->
        <section class="mb-12">
            <h2 class="section-header text-2xl font-bold mb-6">What's In The Box</h2>
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200">
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start">
                        <span class="text-blue-600 mr-3 mt-1">●</span>
                        <span>Manual and Warranty Card</span>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Reviews -->
        <section class="mb-12">
            <h2 class="section-header text-2xl font-bold mb-6">Reviews</h2>
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center space-x-4">
                        <div class="text-6xl font-bold text-gray-900">0.0<span class="text-2xl text-gray-400">/5</span></div>
                        <div>
                            <div class="flex text-yellow-400 text-2xl mb-1">
                                ★★★★★
                            </div>
                            <p class="text-gray-600">No reviews yet</p>
                        </div>
                    </div>
                    <button class="btn-primary px-6 py-3 rounded-lg font-semibold text-white relative z-10">Write a Review</button>
                </div>

                <div class="space-y-3 mb-8">
                    @foreach([5, 4, 3, 2, 1] as $stars)
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-1 w-16">
                            <span class="text-sm font-medium">{{ $stars }}</span>
                            <span class="text-yellow-400">★</span>
                        </div>
                        <div class="flex-1 review-bar">
                            <div class="review-bar-fill" style="width: 0%"></div>
                        </div>
                        <span class="text-sm text-gray-600 w-8">0%</span>
                    </div>
                    @endforeach
                </div>

                <div class="text-center py-12 border-t border-gray-200">
                    <p class="text-gray-500 text-lg">No reviews yet. Be the first one!</p>
                </div>
            </div>
        </section>

        <!-- Q&A -->
        <section class="mb-12">
            <h2 class="section-header text-2xl font-bold mb-6">Question & Answers <span class="text-sm font-normal text-gray-500">(2 Questions)</span></h2>
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200">
                <p class="text-gray-500">No questions yet</p>
            </div>
        </section>

        <!-- Recently Viewed -->
        <section class="mb-12">
            <h2 class="section-header text-2xl font-bold mb-6">Recently Viewed Items</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @for ($i = 0; $i < 4; $i++)
                <div class="product-card bg-white rounded-xl p-4 group">
                    <div class="aspect-square bg-gray-100 rounded-lg mb-4 overflow-hidden">
                        <img src="https://via.placeholder.com/200x200/e2e8f0/475569?text=Product+{{ $i + 1 }}" 
                             alt="Product {{ $i + 1 }}" 
                             class="w-full h-full object-contain group-hover:scale-110 transition duration-500">
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2">Product Name {{ $i + 1 }}</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-lg font-bold text-gray-900">₱{{ number_format(15999 + ($i * 2000), 0) }}</span>
                        <span class="text-sm text-gray-400 line-through">₱{{ number_format(19999 + ($i * 2000), 0) }}</span>
                    </div>
                </div>
                @endfor
            </div>
        </section>

        <!-- You May Also Like -->
        <section class="mb-12">
            <h2 class="section-header text-2xl font-bold mb-6">You May Also Like</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @for ($i = 0; $i < 4; $i++)
                <div class="product-card bg-white rounded-xl p-4 group">
                    <div class="aspect-square bg-gray-100 rounded-lg mb-4 overflow-hidden">
                        <img src="https://via.placeholder.com/200x200/e2e8f0/475569?text=Similar+{{ $i + 1 }}" 
                             alt="Similar Product {{ $i + 1 }}" 
                             class="w-full h-full object-contain group-hover:scale-110 transition duration-500">
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2">Similar Product {{ $i + 1 }}</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-lg font-bold text-gray-900">₱{{ number_format(18999 + ($i * 3000), 0) }}</span>
                        <span class="text-sm text-gray-400 line-through">₱{{ number_format(22999 + ($i * 3000), 0) }}</span>
                    </div>
                </div>
                @endfor
            </div>
        </section>
    </main>

    <script>
        // Mobile menu toggle
        const burgerBtn = document.getElementById('burgerBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        if (burgerBtn && mobileMenu) {
            burgerBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('open');
            });

            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!burgerBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                    mobileMenu.classList.remove('open');
                }
            });
        }

        // Quantity controls
        document.querySelectorAll('input[type="number"]').forEach(input => {
            const decreaseBtn = input.previousElementSibling;
            const increaseBtn = input.nextElementSibling;
            
            decreaseBtn?.addEventListener('click', () => {
                const currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                }
            });
            
            increaseBtn?.addEventListener('click', () => {
                const currentValue = parseInt(input.value);
                input.value = currentValue + 1;
            });
        });

        // Image gallery
        document.querySelectorAll('[alt^="Panasonic"]').forEach((thumbnail, index) => {
            if (thumbnail.parentElement.tagName === 'BUTTON') {
                thumbnail.parentElement.addEventListener('click', () => {
                    // Remove active state from all thumbnails
                    document.querySelectorAll('[alt^="Panasonic"]').forEach(t => {
                        if (t.parentElement.tagName === 'BUTTON') {
                            t.parentElement.classList.remove('border-blue-500');
                            t.parentElement.classList.add('border-gray-200');
                        }
                    });
                    
                    // Add active state to clicked thumbnail
                    thumbnail.parentElement.classList.remove('border-gray-200');
                    thumbnail.parentElement.classList.add('border-blue-500');
                });
            }
        });
    </script>
</body>
</html>