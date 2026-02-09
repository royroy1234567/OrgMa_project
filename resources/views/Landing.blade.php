<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FC Homes</title>

    @vite(['resources/css/app.css', 'resources/js/Landing.js'])
</head>

<body class="overflow-x-hidden">

<nav class="bg-[#004AAD] rounded-b-2xl">
  <div class="container mx-auto px-3 sm:px-4 py-2 flex items-center justify-between">

    <!-- LEFT: Logo -->
    <div class="flex items-center gap-2 shrink-0">
      <img src="{{ asset('images/HOME_CENTER1.png') }}" class="w-10 h-10 sm:w-13 sm:h-13 rounded-full" alt="Logo">
    </div>

    <!-- CENTER: Search -->
    <div class="flex-1 mx-2 sm:mx-4 md:mx-8 relative">
      <input
        type="text"
        placeholder="Search..."
        class="w-full px-3 sm:px-4 py-1.5 sm:py-2 pr-10 sm:pr-12 rounded-full text-sm sm:text-base
               bg-[#2D60A6] text-white placeholder-white
               focus:bg-white focus:text-black
               focus:placeholder-gray-400
               focus:outline-none focus:ring-2 focus:ring-white"
      />
      <img src="{{ asset('images/search1.png') }}"
           class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 w-3.5 h-3.5 sm:w-4 sm:h-4 pointer-events-none"
           alt="Search Icon"/>
    </div>

    <!-- RIGHT: Desktop Links -->
    <div class="hidden md:flex items-center gap-6 mr-4 shrink-0">
      <a href="/Login" class="flex items-center gap-2 text-white font-medium hover:text-gray-300">
        <img src="{{ asset('images/user1.png') }}" class="w-6 h-6">
        Log In
      </a>

      <a href="/User_Cart" class="flex items-center gap-2 text-white font-medium hover:text-gray-300">
        <img src="{{ asset('images/grocery-store1.png') }}" class="w-6 h-6">
        Cart
      </a>
    </div>

    <!-- Burger Menu (Mobile) -->
    <button id="burgerBtn" class="md:hidden flex items-center shrink-0">
      <img src="{{ asset('images/burgermenu.png') }}" class="w-6 h-6 sm:w-7 sm:h-7" alt="Menu">
    </button>
  </div>

  <!-- MOBILE MENU -->
  <div id="mobileMenu"
       class="hidden md:hidden flex-col gap-4 px-6 py-4 bg-[#004AAD] rounded-b-3xl">
    <a href="/Login" class="flex items-center gap-2 text-white">
      <img src="{{ asset('images/user1.png') }}" class="w-6 h-6">
      Log In
    </a>

    <a href="/User_Cart" class="flex items-center gap-2 text-white">
      <img src="{{ asset('images/grocery-store1.png') }}" class="w-6 h-6">
      Cart
    </a>
  </div>
</nav>




<!-- Categories -->
<section class="py-4 overflow-x-hidden">
  <div class="mx-auto px-2 sm:px-4 max-w-7xl">
    <div class="flex gap-4 sm:gap-6 md:gap-8 px-2 sm:px-4 overflow-x-auto md:grid md:overflow-visible
                md:grid-cols-5 lg:grid-cols-10 scrollbar-hide">

      @php
        $categories = [
          ['apple.png', 'Best Deals'],
          ['vivo.png', 'Mobile'],
          ['MSI.png', 'Gadgets'],
          ['tv.png', 'TV'],
          ['Aircon.png', 'Aircon'],
          ['Ha.png', 'Home Appliance'],
          ['orbit-master-18-1.png', 'Small Appliance'],
          ['furniture.png', 'Furniture'],
          ['SH.png', 'Smart Home'],
          ['apple.png', 'Apple'],
        ];
      @endphp

      @foreach($categories as $cat)
      <div class="category-item shrink-0">
        <div class="category-box">
          <img src="{{ asset('images/'.$cat[0]) }}" class="category-icon">
        </div>
        <span class="category-text text-xs sm:text-sm">{{ $cat[1] }}</span>
      </div>
      @endforeach

    </div>
  </div>
</section>

<!-- Promotional Banners Section -->
<section class="w-full px-3 sm:px-6 md:px-8 py-3 overflow-hidden">
  <div class="bg-[#CAE9FF] rounded-xl relative flex items-center justify-center
              h-60 sm:h-80 md:h-96 lg:h-107.5 w-full overflow-hidden">

    <!-- Slides Container -->
    <div class="carousel-slides flex transition-transform duration-500 w-full h-full">

      <!-- Slide 1 -->
      <div class="w-full h-full relative flex items-center justify-center shrink-0 px-4">
        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-[#004AAD] z-10 text-center">
          NEW YEAR SALE
        </h2>
        <img src="{{ asset('images/banner-products.png') }}"
             class="absolute left-2 sm:left-4 md:left-8 top-1/2 -translate-y-1/2
                    w-32 sm:w-48 md:w-60 lg:w-80"
             alt="Sale Products">
      </div>

      <!-- Slide 2 -->
      <div class="w-full h-full relative flex items-center justify-center shrink-0 px-4">
        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-[#004AAD] z-10 text-center">
          NEW YEAR SALE 2
        </h2>
        <img src="{{ asset('images/banner-products.png') }}"
             class="absolute left-2 sm:left-4 md:left-8 top-1/2 -translate-y-1/2
                    w-32 sm:w-48 md:w-60 lg:w-80"
             alt="Sale Products">
      </div>

      <!-- Slide 3 -->
      <div class="w-full h-full relative flex items-center justify-center shrink-0 px-4">
        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-[#004AAD] z-10 text-center">
          NEW YEAR SALE 3
        </h2>
        <img src="{{ asset('images/banner-products.png') }}"
             class="absolute left-2 sm:left-4 md:left-8 top-1/2 -translate-y-1/2
                    w-32 sm:w-48 md:w-60 lg:w-80"
             alt="Sale Products">
      </div>

    </div>

    <!-- Carousel Dots -->
    <div class="absolute bottom-4 sm:bottom-6 left-1/2 -translate-x-1/2 flex gap-2 sm:gap-3 z-20">
      <button class="dot w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-[#2D60A6]" data-slide="0"></button>
      <button class="dot w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-[#2D60A6]" data-slide="1"></button>
      <button class="dot w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-[#2D60A6]" data-slide="2"></button>
    </div>

  </div>
</section>

<!-- Services Section -->
<section class="py-4 overflow-x-hidden">
  <div class="mx-auto px-3 sm:px-4 max-w-7xl">
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 md:gap-6">

      @php
        $services = [
          ['PS.png', 'Payment Solutions'],
          ['SDD.png', 'Same Day Delivery'],
          ['AP.png', 'Appliance Padala'],
          ['HS.png', 'Home Services'],
        ];
      @endphp

      @foreach($services as $service)
      <div class="flex flex-col sm:flex-row items-center justify-center gap-2 p-3 hover:shadow-lg hover:scale-105 transition transform duration-300 rounded-lg">
        <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 flex items-center justify-center shrink-0">
          <img src="{{ asset('images/'.$service[0]) }}" class="w-full h-full object-contain">
        </div>
        <span class="text-xs sm:text-sm md:text-base text-center sm:text-left max-w-30">
          {{ $service[1] }}
        </span>
      </div>
      @endforeach

    </div>
  </div>
</section>

<!-- Product Sale Carousel Section -->
<section class="w-full px-3 sm:px-6 md:px-8 py-3 overflow-hidden">
  <div class="bg-[#CAE9FF] rounded-xl relative flex flex-col items-center justify-start w-full overflow-hidden p-4 sm:p-6 md:p-8">

    <!-- Header -->
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#004AAD] mb-6 sm:mb-8 text-center">
      Biggest Sale of the Year!
    </h1>

    <!-- Carousel container -->
    <div class="relative w-full">
      <!-- Buttons -->
      <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-300 bg-opacity-50 text-white px-2 sm:px-3 py-1.5 sm:py-2 rounded-full z-20 hover:bg-gray-400 hover:bg-opacity-70 transition text-sm sm:text-base">
        &lt;
      </button>
      <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-300 bg-opacity-50 text-white px-2 sm:px-3 py-1.5 sm:py-2 rounded-full z-20 hover:bg-gray-400 hover:bg-opacity-70 transition text-sm sm:text-base">
        &gt;
      </button>

      <!-- Scrollable products -->
      <div id="carousel" class="flex gap-3 sm:gap-4 md:gap-6 overflow-x-auto scroll-smooth hide-scrollbar py-4 px-8 sm:px-10">
        @php
          $products = [
            [
              'image' => 'product1.png',
              'name' => 'Samsung Neo 4K QA55QN88DAGXXP',
              'description' => '55-inch, 4K UHD, Smart TV, Quantum Mini LED',
              'current_price' => '₱52,992',
              'previous_price' => '₱110,992',
              'tags' => ['2024', 'SALE']
            ],
            [
              'image' => 'product1.png',
              'name' => 'Samsung Neo 4K QA55QN88DAGXXP',
              'description' => '55-inch, 4K UHD, Smart TV, Quantum Mini LED',
              'current_price' => '₱52,992',
              'previous_price' => '₱110,992',
              'tags' => ['2024', 'SALE']
            ],
            [
              'image' => 'product1.png',
              'name' => 'Samsung Neo 4K QA55QN88DAGXXP',
              'description' => '55-inch, 4K UHD, Smart TV, Quantum Mini LED',
              'current_price' => '₱52,992',
              'previous_price' => '₱110,992',
              'tags' => ['2024', 'SALE']
            ],
            [
              'image' => 'product1.png',
              'name' => 'Samsung Neo 4K QA55QN88DAGXXP',
              'description' => '55-inch, 4K UHD, Smart TV, Quantum Mini LED',
              'current_price' => '₱52,992',
              'previous_price' => '₱110,992',
              'tags' => ['2024', 'SALE']
            ],
            [
              'image' => 'product1.png',
              'name' => 'Samsung Neo 4K QA55QN88DAGXXP',
              'description' => '55-inch, 4K UHD, Smart TV, Quantum Mini LED',
              'current_price' => '₱52,992',
              'previous_price' => '₱110,992',
              'tags' => ['2024', 'SALE']
            ],
            [
              'image' => 'product1.png',
              'name' => 'Samsung Neo 4K QA55QN88DAGXXP',
              'description' => '55-inch, 4K UHD, Smart TV, Quantum Mini LED',
              'current_price' => '₱52,992',
              'previous_price' => '₱110,992',
              'tags' => ['2024', 'SALE']
            ],
          ];
        @endphp

        @foreach($products as $product)
        <a href="{{ url('U_ViewProduct') }}" class="Product-sale-container bg-white p-3 sm:p-4 rounded-xl shadow-md w-40 sm:w-50 md:min-w-50 shrink-0 hover:shadow-xl hover:scale-105 transition-all duration-300 cursor-pointer">
          
          <!-- Tags -->
          <div class="flex gap-1 sm:gap-2 mb-2 justify-end">
            @foreach($product['tags'] as $tag)
              <span class="bg-gray-200 text-gray-700 text-[10px] sm:text-xs font-semibold px-1.5 sm:px-2 py-0.5 sm:py-1 rounded">
                {{ $tag }}
              </span>
            @endforeach
          </div>

          <!-- Product Image -->
          <img src="{{ asset('images/'.$product['image']) }}" class="w-full h-32 sm:h-40 md:h-48 object-contain mb-3 sm:mb-4 bg-[#F2F2F2] rounded-xl">

          <!-- Product Name -->
          <h3 class="text-xs sm:text-sm md:text-md text-[#646464] text-center mb-1 line-clamp-2">{{ $product['name'] }}</h3>

          <!-- Description -->
          <p class="text-[#717171] text-[10px] sm:text-xs md:text-sm text-center mb-2 line-clamp-2">{{ $product['description'] }}</p>

          <!-- Prices -->
          <div class="flex flex-col sm:flex-row items-center gap-1 sm:gap-2 justify-center">
            <span class="text-[#434343] font-bold text-sm sm:text-base md:text-lg">{{ $product['current_price'] }}</span>
            <span class="text-gray-400 line-through text-xs sm:text-sm">{{ $product['previous_price'] }}</span>
          </div>

        </a>
        @endforeach
      </div>
    </div>
    
    <a href="#" class="text-white font-bold px-4 py-2 rounded-md text-center inline-block transition hover:bg-black/30 text-sm sm:text-base mt-4" 
       style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
      See more
    </a>
  </div>
</section>

<!-- Shop List Section-->
<section class="py-4 overflow-x-hidden">
  <h1 class="text-xl sm:text-2xl font-bold text-[#4E4E4E] mb-6 sm:mb-8 text-center px-4">
    Shop from our official FC Home Center accounts
  </h1>
  <div class="mx-auto px-3 sm:px-4 max-w-7xl">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4 sm:gap-6">
            
      @php
        $shopOptions = [
          ['icon' => 'store.png', 'title' => 'Shop in-Store', 'subtitle' => '000 Stores Nationwide'],
          ['icon' => 'viber1.png', 'title' => 'Shop on Viber', 'subtitle' => 'FC Homes Center Official'],
          ['icon' => 'whatsapp1.png', 'title' => 'Shop on WhatsApp', 'subtitle' => '+63 900 000 0000'],
          ['icon' => 'telephone1.png', 'title' => 'Call to Shop', 'subtitle' => '#0000-0000'],
          ['icon' => 'facebook1.png', 'title' => 'Shop on Facebook', 'subtitle' => 'FC Home Center'],
        ];
      @endphp

      @foreach($shopOptions as $option)
        <div class="flex items-center gap-3 group cursor-pointer hover:bg-gray-50 p-3 sm:p-4 rounded-lg transition-all duration-300">
          <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-lg flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-300">
            <img src="{{ asset('images/' . $option['icon']) }}" alt="{{ $option['title'] }}" class="w-full h-full object-contain">
          </div>
          <div class="flex flex-col min-w-0">
            <span class="font-semibold text-gray-800 text-sm sm:text-base truncate">
              {{ $option['title'] }}
            </span>
            <span class="text-xs text-gray-600 truncate">
              {{ $option['subtitle'] }}
            </span>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</section>

<!-- Trending section -->
<section class="py-6 border-t-2 border-gray-300 my-6 mx-3 sm:mx-6 md:mx-12 overflow-x-hidden">
  <h1 class="text-xl sm:text-2xl font-bold text-[#4E4E4E] mb-6 px-2">What's Trending</h1>
  
  <!-- Mobile View (< md) -->
  <div class="md:hidden">
    <div class="bg-linear-to-br from-blue-400 via-purple-400 to-pink-400 rounded-2xl p-8 mb-6 relative h-48 sm:h-60">
      <!-- Emojis -->
      <div class="absolute top-2 left-2">
        <div class="bg-blue-500 rounded-full p-2 shadow-lg">
          <span class="text-xl">👍</span>
        </div>
      </div>
      <div class="absolute top-2 right-8">
        <span class="text-3xl">☀️</span>
      </div>
      <div class="absolute bottom-2 left-2">
        <div class="bg-pink-500 rounded-full p-2 shadow-lg">
          <span class="text-xl">❤️</span>
        </div>
      </div>
      <div class="absolute bottom-2 right-2">
        <span class="text-2xl">😍</span>
      </div>
      
      <!-- Title -->
      <h2 class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-4xl sm:text-5xl font-black tracking-wide leading-tight text-center" 
          style="text-shadow: 3px 3px 0px rgba(0,0,0,0.3); -webkit-text-stroke: 3px #1e40af; font-family: Arial Black, sans-serif;">
        WHAT'S<br>TRENDING
      </h2>
    </div>
    
    <!-- Carousel for mobile -->
    <div class="relative">
      <button id="prevBtnc-mobile" class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-300 bg-opacity-50 text-white px-2 py-1.5 rounded-full z-20 hover:bg-gray-400 hover:bg-opacity-70 transition">
        &lt;
      </button>
      <button id="nextBtnc-mobile" class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-300 bg-opacity-50 text-white px-2 py-1.5 rounded-full z-20 hover:bg-gray-400 hover:bg-opacity-70 transition">
        &gt;
      </button>
      
      <div id="trendingCarousel-mobile" class="flex gap-3 overflow-x-auto scroll-smooth hide-scrollbar py-4 px-8">
        @php
          $trendingProducts = [
            ['image' => 'product1.png', 'name' => 'Samsung Neo 4K QA55QN88DAGXXP', 'description' => '55-inch, 4K UHD, Smart TV, Quantum Mini LED', 'current_price' => '₱52,992', 'previous_price' => '₱110,992', 'tags' => ['2024', 'SALE']],
            ['image' => 'product1.png', 'name' => 'Samsung Neo 4K QA55QN88DAGXXP', 'description' => '55-inch, 4K UHD, Smart TV, Quantum Mini LED', 'current_price' => '₱52,992', 'previous_price' => '₱110,992', 'tags' => ['2024', 'SALE']],
            ['image' => 'product1.png', 'name' => 'Samsung Neo 4K QA55QN88DAGXXP', 'description' => '55-inch, 4K UHD, Smart TV, Quantum Mini LED', 'current_price' => '₱52,992', 'previous_price' => '₱110,992', 'tags' => ['2024', 'SALE']],
            ['image' => 'product1.png', 'name' => 'Samsung Neo 4K QA55QN88DAGXXP', 'description' => '55-inch, 4K UHD, Smart TV, Quantum Mini LED', 'current_price' => '₱52,992', 'previous_price' => '₱110,992', 'tags' => ['2024', 'SALE']],
            ['image' => 'product1.png', 'name' => 'Samsung Neo 4K QA55QN88DAGXXP', 'description' => '55-inch, 4K UHD, Smart TV, Quantum Mini LED', 'current_price' => '₱52,992', 'previous_price' => '₱110,992', 'tags' => ['2024', 'SALE']],
          ];
        @endphp
        
        @foreach($trendingProducts as $product)
        <a href="{{ url('U_ViewProduct') }}" class="Product-sale-container bg-white p-3 rounded-xl shadow-md w-40 shrink-0 hover:shadow-xl hover:scale-105 transition-all duration-300 cursor-pointer">
          <div class="flex gap-1 mb-2 justify-end">
            @foreach($product['tags'] as $tag)
              <span class="bg-gray-200 text-gray-700 text-[10px] font-semibold px-1.5 py-0.5 rounded">{{ $tag }}</span>
            @endforeach
          </div>
          <img src="{{ asset('images/'.$product['image']) }}" class="w-full h-32 object-contain mb-3 bg-[#F2F2F2] rounded-xl">
          <h3 class="text-xs text-[#646464] text-center mb-1 line-clamp-2">{{ $product['name'] }}</h3>
          <p class="text-[#717171] text-[10px] text-center mb-2 line-clamp-2">{{ $product['description'] }}</p>
          <div class="flex flex-col items-center gap-1 justify-center">
            <span class="text-[#434343] font-bold text-sm">{{ $product['current_price'] }}</span>
            <span class="text-gray-400 line-through text-xs">{{ $product['previous_price'] }}</span>
          </div>
        </a>
        @endforeach
      </div>
    </div>
  </div>
  
  <!-- Desktop View (md+) -->
  <div class="hidden md:flex relative items-center w-full overflow-visible">
    <!-- Left gradient box -->
    <div class="relative bg-linear-to-br rounded-2xl from-blue-400 via-purple-400 to-pink-400 p-12 w-[45%] h-96 lg:h-112.5 shrink-0 z-0">
      <div class="absolute top-4 left-4">
        <div class="bg-blue-500 rounded-full p-3 shadow-lg">
          <span class="text-2xl">👍</span>
        </div>
      </div>
      <div class="absolute top-2 right-12">
        <span class="text-5xl">☀️</span>
      </div>
      <div class="absolute bottom-4 left-4">
        <div class="bg-pink-500 rounded-full p-3 shadow-lg">
          <span class="text-2xl">❤️</span>
        </div>
      </div>
      <div class="absolute bottom-2 right-4">
        <span class="text-4xl">😍</span>
      </div>
      
      <h2 class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-6xl lg:text-8xl font-black tracking-wide leading-tight text-center" 
          style="text-shadow: 5px 5px 0px rgba(0,0,0,0.3); -webkit-text-stroke: 5px #1e40af; font-family: Arial Black, sans-serif;">
        WHAT'S<br>TRENDING
      </h2>
    </div>

    <!-- Carousel container - overlapping -->
    <div class="absolute left-[43%] right-0 z-10">
      <button id="prevBtnc" class="absolute left-4 top-1/2 -translate-y-1/2 bg-gray-300 bg-opacity-50 text-white px-3 py-2 rounded-full z-20 hover:bg-gray-400 hover:bg-opacity-70 transition">
        &lt;
      </button>
      <button id="nextBtnc" class="absolute right-4 top-1/2 -translate-y-1/2 bg-gray-300 bg-opacity-50 text-white px-3 py-2 rounded-full z-20 hover:bg-gray-400 hover:bg-opacity-70 transition">
        &gt;
      </button>

      <div id="trendingCarousel" class="flex gap-6 overflow-x-auto scroll-smooth hide-scrollbar py-4">
        @foreach($trendingProducts as $product)
        <a href="{{ url('U_ViewProduct') }}" class="Product-sale-container bg-white p-4 rounded-xl shadow-md min-w-50 shrink-0 hover:shadow-xl hover:scale-105 transition-all duration-300 cursor-pointer">
          <div class="flex gap-2 mb-2 justify-end">
            @foreach($product['tags'] as $tag)
              <span class="bg-gray-200 text-gray-700 text-xs font-semibold px-2 py-1 rounded">{{ $tag }}</span>
            @endforeach
          </div>
          <img src="{{ asset('images/'.$product['image']) }}" class="w-full h-48 object-contain mb-4 bg-[#F2F2F2] rounded-xl">
          <h3 class="text-md text-[#646464] text-center mb-1">{{ $product['name'] }}</h3>
          <p class="text-[#717171] text-sm text-center mb-2">{{ $product['description'] }}</p>
          <div class="flex items-center gap-2 justify-center">
            <span class="text-[#434343] font-bold text-lg">{{ $product['current_price'] }}</span>
            <span class="text-gray-400 line-through text-sm">{{ $product['previous_price'] }}</span>
          </div>
        </a>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- Shop by Brand Section -->
<section class="py-6 border-t-2 border-gray-300 my-6 mx-3 sm:mx-6 md:mx-12 overflow-x-hidden">
  <h1 class="text-xl sm:text-2xl font-bold text-[#4E4E4E] mb-6 px-2">Shop by Brand</h1>

  <div class="relative w-full">
    <button id="prevBtnb" class="absolute left-0 sm:left-2 top-1/2 -translate-y-1/2 z-20 bg-gray-300 bg-opacity-50 text-white px-2 sm:px-3 py-1.5 sm:py-2 rounded-full hover:bg-gray-400 hover:bg-opacity-70 transition">
      &lt;
    </button>
    <button id="nextBtnb" class="absolute right-0 sm:right-2 top-1/2 -translate-y-1/2 z-20 bg-gray-300 bg-opacity-50 text-white px-2 sm:px-3 py-1.5 sm:py-2 rounded-full hover:bg-gray-400 hover:bg-opacity-70 transition">
      &gt;
    </button>

    <div id="brandCarousel" class="flex flex-nowrap gap-3 sm:gap-4 md:gap-6 overflow-x-auto scroll-smooth hide-scrollbar px-8 sm:px-10 md:px-12 py-4">
      @php
        $brands = [
          ['image' => 'Apple_text.png', 'color' => 'bg-black'],
          ['image' => 'TCL.png', 'color' => 'bg-[#F04848]'],
          ['image' => 'Samsung.png', 'color' => 'bg-[#004AAD]'],
          ['image' => 'Panasonic.png', 'color' => 'bg-black'],
          ['image' => 'Carrier.png', 'color' => 'bg-[#1B3A65]'],
          ['image' => 'sony.png', 'color' => 'bg-black'],
          ['image' => 'brand7.png', 'color' => 'bg-orange-100'],
        ];
      @endphp

      @foreach($brands as $brand)
        <div class="shrink-0 p-3 sm:p-4 rounded-2xl transition duration-300 hover:shadow-lg hover:scale-105 {{ $brand['color'] }}">
          <img src="{{ asset('images/' . $brand['image']) }}" alt="Brand Logo" class="w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 object-contain">
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Category Section -->
@php
$categories = ['Recommended', 'Free Shipping', 'Same Day Delivery', 'New Arrivals', 'Super Inverter', 'FC Home Exclusive', 'Best Pick'];

$products = [
    ['name' => 'TP-Link Tapo L530E', 'description' => 'Smart Light Bulb, Multicolor', 'current_price' => '₱349', 'previous_price' => '₱499', 'tags' => ['Sale', 'Recommended'], 'image' => 'tapo-l530e.png', 'categories' => ['Recommended', 'New Arrivals']],
    ['name' => 'TP-Link Tapo Indoor C210', 'description' => 'Smart Camera Security Wi-Fi Camera', 'current_price' => '₱1,279', 'previous_price' => '₱1,499', 'tags' => ['New'], 'image' => 'tapo-c210.png', 'categories' => ['Free Shipping', 'FC Home Exclusive']],
    ['name' => 'Samsung Smart TV', 'description' => '4K UHD Smart TV', 'current_price' => '₱19,999', 'previous_price' => '₱21,999', 'tags' => ['Best Pick', 'Super Inverter'], 'image' => 'samsung-tv.png', 'categories' => ['Super Inverter', 'Best Pick']],
    ['name' => 'Samsung Smart TV', 'description' => '4K UHD Smart TV', 'current_price' => '₱19,999', 'previous_price' => '₱21,999', 'tags' => ['Best Pick', 'Super Inverter'], 'image' => 'samsung-tv.png', 'categories' => ['Best Pick', 'Same Day Delivery']],
    ['name' => 'TP-Link Tapo Indoor C210', 'description' => 'Smart Camera Security Wi-Fi Camera', 'current_price' => '₱1,279', 'previous_price' => '₱1,499', 'tags' => ['New'], 'image' => 'tapo-c210.png', 'categories' => ['Free Shipping', 'FC Home Exclusive']],
    ['name' => 'TP-Link Tapo L530E', 'description' => 'Smart Light Bulb, Multicolor', 'current_price' => '₱349', 'previous_price' => '₱499', 'tags' => ['Sale', 'Recommended'], 'image' => 'tapo-l530e.png', 'categories' => ['Recommended', 'New Arrivals']],
    ['name' => 'TP-Link Tapo L530E', 'description' => 'Smart Light Bulb, Multicolor', 'current_price' => '₱349', 'previous_price' => '₱499', 'tags' => ['Sale', 'Recommended'], 'image' => 'tapo-l530e.png', 'categories' => ['Recommended', 'New Arrivals']],
];
@endphp

<section class="px-3 sm:px-4 md:px-6 py-6 sm:py-8 overflow-x-hidden">

    <!-- Category Filters -->
    <div class="flex flex-wrap gap-2 sm:gap-3 md:gap-4 mb-6 bg-[#477ED254] py-4 sm:py-5 justify-center px-2 rounded-lg">
        @foreach($categories as $category)
            <button
                class="category-btn px-3 sm:px-4 md:px-5 py-1.5 sm:py-2 text-xs sm:text-sm md:text-base text-gray-800 rounded-full border font-semibold border-white hover:text-blue-500 hover:bg-white hover:border-blue-500 transition whitespace-nowrap"
                data-category="{{ $category }}"
            >
                {{ $category }}
            </button>
        @endforeach
    </div>

    <!-- Products Grid -->
    <div id="productsGrid" class="grid grid-cols-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-6 sm:gap-4 md:gap-6">
        @foreach($products as $product)
            <a href="{{ url('U_ViewProduct') }}" 
               class="product-card Product-sale-container bg-white p-3 sm:p-4 rounded-xl shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 cursor-pointer"
               data-categories="{{ implode(',', $product['categories']) }}">
                
                <!-- Tags -->
                <div class="flex gap-1 sm:gap-2 mb-2 justify-start flex-wrap">
                    @foreach($product['tags'] as $tag)
                        <span class="bg-gray-200 text-gray-700 text-[10px] sm:text-xs font-semibold px-1.5 sm:px-2 py-0.5 sm:py-1 rounded">
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>

                <!-- Product Image -->
                <img src="{{ asset('images/'.$product['image']) }}" 
                     class="w-full h-32 sm:h-40 md:h-48 object-contain mb-3 sm:mb-4 bg-[#F2F2F2] rounded-xl">

                <!-- Product Name -->
                <h3 class="text-xs sm:text-sm md:text-md text-[#646464] text-center mb-1 line-clamp-2">{{ $product['name'] }}</h3>

                <!-- Description -->
                <p class="text-[#717171] text-[10px] sm:text-xs md:text-sm text-center mb-2 line-clamp-2">{{ $product['description'] }}</p>

                <!-- Prices -->
                <div class="flex flex-col sm:flex-row items-center gap-1 sm:gap-2 justify-center">
                    <span class="text-[#434343] font-bold text-sm sm:text-base md:text-lg">{{ $product['current_price'] }}</span>
                    <span class="text-gray-400 line-through text-xs sm:text-sm">{{ $product['previous_price'] }}</span>
                </div>
            </a>
        @endforeach
    </div>
</section>

<style>
/* Hide scrollbar for Chrome, Safari and Opera */
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.hide-scrollbar {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}

/* Prevent horizontal scroll on body */
body {
    overflow-x: hidden;
}

/* Line clamp utilities */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

</body>
</html>