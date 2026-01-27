<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FC Homes</title>

    @vite(['resources/css/app.css', 'resources/js/Landing.js'])
</head>

<body>

<nav class="bg-[#004AAD] rounded-b-3xl">
  <div class="container mx-auto px-4 py-2 flex items-center justify-between">

    <!-- LEFT: Logo -->
    <div class="flex items-center gap-2">
      <img src="{{ asset('images/HOME_CENTER1.png') }}" class="w-13 h-13 rounded-full" alt="Logo">
    </div>

    <!-- CENTER: Search -->
    <div class="flex-1 mx-4 md:mx-8 relative">
      <input
        type="text"
        placeholder="Search..."
        class="w-full px-4 py-2 pr-12 rounded-full
               bg-[#2D60A6] text-white placeholder-white
               focus:bg-white focus:text-black
               focus:placeholder-gray-400
               focus:outline-none focus:ring-2 focus:ring-white"
      />
      <img src="{{ asset('images/search1.png') }}"
           class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 pointer-events-none"
           alt="Search Icon"/>
    </div>

    <!-- RIGHT: Desktop Links -->
    <div class="hidden md:flex items-center gap-6 mr-4">
      <a href="/Login" class="flex items-center gap-2 text-white font-medium hover:text-gray-300">
        <img src="{{ asset('images/user1.png') }}" class="w-6 h-6">
        Log In
      </a>

      <a href="#" class="flex items-center gap-2 text-white font-medium hover:text-gray-300">
        <img src="{{ asset('images/grocery-store1.png') }}" class="w-6 h-6">
        Cart
      </a>
    </div>

    <!-- Burger Menu (Mobile) -->
    <button id="burgerBtn" class="md:hidden flex items-center">
      <img src="{{ asset('images/burgermenu.png') }}" class="w-7 h-7" alt="Menu">
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

<!-- Categories -->
<section class="py-4">
  <div class="mx-auto px-4 max-w-[1400px]">
    <div class="flex gap-8 px-4 overflow-x-auto md:grid md:overflow-visible
                md:[grid-template-columns:repeat(auto-fit,minmax(80px,1fr))]">

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
      <div class="category-item">
        <div class="category-box">
          <img src="{{ asset('images/'.$cat[0]) }}" class="category-icon">
        </div>
        <span class="category-text">{{ $cat[1] }}</span>
      </div>
      @endforeach

    </div>
  </div>
</section>

<!-- Promotional Banners Section -->
<section class="w-full px-8 py-3 overflow-hidden mx-0">
<div class="bg-[#CAE9FF] rounded-xl relative flex items-center justify-center
            h-[430px] w-full overflow-hidden">


    <!-- Slides Container -->
    <div class="carousel-slides flex transition-transform duration-500
                w-[100%] h-full">

      <!-- Slide 1 -->
      <div class="w-full h-full relative flex items-center justify-center flex-shrink-0">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-[#004AAD] z-10 text-center">
          NEW YEAR SALE
        </h2>
        <img src="{{ asset('images/banner-products.png') }}"
             class="absolute left-8 top-1/2 -translate-y-1/2
                    w-48 sm:w-60 md:w-80"
             alt="Sale Products">
      </div>

      <!-- Slide 2 -->
      <div class="w-full h-full relative flex items-center justify-center flex-shrink-0">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-[#004AAD] z-10 text-center">
          NEW YEAR SALE 2
        </h2>
        <img src="{{ asset('images/banner-products.png') }}"
             class="absolute left-8 top-1/2 -translate-y-1/2
                    w-48 sm:w-60 md:w-80"
             alt="Sale Products">
      </div>

      <!-- Slide 3 -->
      <div class="w-full h-full relative flex items-center justify-center flex-shrink-0">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-[#004AAD] z-10 text-center">
          NEW YEAR SALE 3
        </h2>
        <img src="{{ asset('images/banner-products.png') }}"
             class="absolute left-8 top-1/2 -translate-y-1/2
                    w-48 sm:w-60 md:w-80"
             alt="Sale Products">
      </div>

    </div>

    <!-- Carousel Dots (MATCH SA JS) -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2
                flex gap-3 z-20">
      <button class="dot w-3 h-3 rounded-full bg-[#2D60A6]"
              data-slide="0"></button>
      <button class="dot w-3 h-3 rounded-full bg-[#2D60A6]"
              data-slide="1"></button>
      <button class="dot w-3 h-3 rounded-full bg-[#2D60A6]"
              data-slide="2"></button>
    </div>

  </div>
</section>
<!-- Services Section -->
<section class="py-1">
  <div class="mx-auto px-4 max-w-[1400px]">
    <!-- Parent flex: center all items -->
    <div class="flex gap-30 flex-wrap justify-center">

      @php
        $services = [
          ['PS.png', 'Payment Solutions'],
          ['SDD.png', 'Same Day Delivery'],
          ['AP.png', 'Appliance Padala'],
          ['HS.png', 'Home Services'],
        ];
      @endphp

      @foreach($services as $service)
      <!-- Single container per service -->
      <div class="flex items-center p-2 hover:shadow-lg hover:scale-105 transition transform duration-300">
        <!-- Image -->
        <div class="w-16 h-16 flex items-center justify-center">
          <img src="{{ asset('images/'.$service[0]) }}" class="w-15 h-15 object-contain">
        </div>
        <!-- Text -->
        <span class="text-sm md:text-base break-words whitespace-normal max-w-[120px] text-center">
          {{ $service[1] }}
        </span>
      </div>
      @endforeach

    </div>
  </div>
</section>


<!-- Product Sale Carousel Section -->
<section class="w-full px-8 py-3 overflow-hidden mx-0">
  <div class="bg-[#CAE9FF] rounded-xl relative flex flex-col items-center justify-start w-full overflow-hidden p-8">

    <!-- Header at the top -->
    <h1 class="text-4xl font-bold text-[#004AAD] mb-8 text-center">
      Biggest Sale of the Year!
    </h1>

    <!-- Carousel container -->
    <div class="relative w-full m-auto">
      <!-- Buttons -->
      <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-300 bg-opacity-50 text-white px-3 py-2 rounded-full z-20 hover:bg-gray-400 hover:bg-opacity-70 transition">
        <
      </button>
      <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-300 bg-opacity-50 text-white px-3 py-2 rounded-full z-20 hover:bg-gray-400 hover:bg-opacity-70 transition">
        >
      </button>


      <!-- Scrollable products -->
      <div id="carousel" class="flex gap-6 overflow-x-auto scroll-smooth hide-scrollbar py-4">
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
        <div class="Product-sale-container bg-white p-4 rounded-xl shadow-md min-w-[200px] flex-shrink-0">
          
          <!-- Tags -->
          <div class="flex gap-2 mb-2 justify-end ml-27">
            @foreach($product['tags'] as $tag)
              <span class="bg-gray-200 text-gray-700 text-xs font-semibold px-2 py-1 rounded">
                {{ $tag }}
              </span>
            @endforeach
          </div>

          <!-- Product Image -->
          <img src="{{ asset('images/'.$product['image']) }}" class="w-full h-48 object-contain mb-4 bg-[#F2F2F2] rounded-xl">

          <!-- Product Name -->
          <h3 class="text-md text-[#646464] text-center mb-1">{{ $product['name'] }}</h3>

          <!-- Description -->
          <p class="text-[#717171] text-sm text-center mb-2">{{ $product['description'] }}</p>

          <!-- Prices -->
          <div class="flex items-center gap-2 justify-center">
            <span class="text-[#434343] font-bold text-lg">{{ $product['current_price'] }}</span>
            <span class="text-gray-400 line-through text-sm">{{ $product['previous_price'] }}</span>
          </div>

        </div>
        @endforeach
      </div>
    </div>
    <a href="#" class="text-white font-bold px-4 py-2 rounded-md text-center inline-block transition hover:bg-black/30" 
   style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
  See more
</a>
  </div>
</section>



<!-- Shop List Section-->
<section class="py-1">
   <h1 class="text-2xl font-bold text-[#4E4E4E] mb-8 text-center">
      Shop from our official FC Home Center accounts
    </h1>
  <div class="mx-auto px-4 max-w-[1400px]">
    <!-- Parent flex: center all items -->
    <div class="flex gap-20 flex-wrap justify-center">
            
            @php
                $shopOptions = [
                    [
                        'icon' => 'store.png',
                        'title' => 'Shop in-Store',
                        'subtitle' => '000 Stores Nationwide',
                    ],
                    [
                        'icon' => 'viber1.png',
                        'title' => 'Shop on Viber',
                        'subtitle' => 'FC Homes Center Official',
                    ],
                    [
                        'icon' => 'whatsapp1.png',
                        'title' => 'Shop on WhatsApp',
                        'subtitle' => '+63 900 000 0000',
                    ],
                    [
                        'icon' => 'telephone1.png',
                        'title' => 'Call to Shop',
                        'subtitle' => '#0000-0000',
                    ],
                    [
                        'icon' => 'facebook1.png',
                        'title' => 'Shop on Facebook',
                        'subtitle' => 'FC Home Center',
                    ],
                ];
            @endphp

            @foreach($shopOptions as $option)
                <div class="flex items-center gap-3 group cursor-pointer hover:bg-gray-50 p-2 rounded-lg transition-all duration-300">
                    <!-- Icon Container -->
                    <div class="w-12 h-12 md:w-14 md:h-14 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:scale-105 transition-transform duration-300">
                        <img 
                            src="{{ asset('images/' . $option['icon']) }}" 
                            alt="{{ $option['title'] }}" 
                            class="w-full h-full object-contain"
                        >
                    </div>
                    
                    <!-- Text Content -->
                    <div class="flex flex-col">
                        <span class="font-semibold text-gray-800 text-sm md:text-base whitespace-nowrap">
                            {{ $option['title'] }}
                        </span>
                        <span class="text-xs text-gray-600">
                            {{ $option['subtitle'] }}
                        </span>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<!--Trending section-->
<section class="py-6 border-t-2 border-gray-300 my-6 mx-12">
  <h1 class="text-2xl font-bold text-[#4E4E4E] mb-6">What's Trending</h1>
  <div class="relative flex items-center w-full overflow-visible">

    <!-- Left side: Gradient box with "What's Trending" -->
    <div class="relative bg-gradient-to-br rounded-2xl from-blue-400 via-purple-400 to-pink-400 p-12 w-[45%] h-[450px] flex-shrink-0 z-0">
      <!-- Emojis positioned at corners -->
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


      <!-- Main Title -->
      <h2 class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-8xl font-black tracking-wide leading-tight text-center" style="text-shadow: 5px 5px 0px rgba(0,0,0,0.3); -webkit-text-stroke: 5px #1e40af; font-family: Arial Black, sans-serif;">
        WHAT'S<br>TRENDING
      </h2>
    </div>

    <!-- Carousel container - overlapping the gradient box -->
    <div class="absolute left-[43%] right-0 z-10">
      <!-- Buttons -->
      <button id="prevBtnc" class="absolute left-4 top-1/2 -translate-y-1/2 bg-gray-300 bg-opacity-50 text-white px-3 py-2 rounded-full z-20 hover:bg-gray-400 hover:bg-opacity-70 transition">
        &lt;
      </button>
      <button id="nextBtnc" class="absolute right-4 top-1/2 -translate-y-1/2 bg-gray-300 bg-opacity-50 text-white px-3 py-2 rounded-full z-20 hover:bg-gray-400 hover:bg-opacity-70 transition">
        &gt;
      </button>

      <!-- Scrollable products -->
      <div id="trendingCarousel" class="flex gap-6 overflow-x-auto scroll-smooth hide-scrollbar py-4">
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
          ];
        @endphp

        @foreach($products as $product)
        <div class="Product-sale-container bg-white p-4 rounded-xl shadow-md min-w-[200px] flex-shrink-0">
          
          <!-- Tags -->
          <div class="flex gap-2 mb-2 justify-end">
            @foreach($product['tags'] as $tag)
              <span class="bg-gray-200 text-gray-700 text-xs font-semibold px-2 py-1 rounded">
                {{ $tag }}
              </span>
            @endforeach
          </div>

          <!-- Product Image -->
          <img src="{{ asset('images/'.$product['image']) }}" class="w-full h-48 object-contain mb-4 bg-[#F2F2F2] rounded-xl">

          <!-- Product Name -->
          <h3 class="text-md text-[#646464] text-center mb-1">{{ $product['name'] }}</h3>

          <!-- Description -->
          <p class="text-[#717171] text-sm text-center mb-2">{{ $product['description'] }}</p>

          <!-- Prices -->
          <div class="flex items-center gap-2 justify-center">
            <span class="text-[#434343] font-bold text-lg">{{ $product['current_price'] }}</span>
            <span class="text-gray-400 line-through text-sm">{{ $product['previous_price'] }}</span>
          </div>

        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>



<section class="py-6 border-t-2 border-gray-300 my-6 mx-12">
  <h1 class="text-2xl font-bold text-[#4E4E4E] mb-6">Shop by Brand</h1>

  <!-- Carousel wrapper: relative for absolute buttons -->
  <div class="relative w-full">

    <!-- Prev Button -->
    <button
      id="prevBtnb"
      class="absolute left-0 top-1/2 -translate-y-1/2 z-20
             bg-gray-300 bg-opacity-50 text-white px-3 py-2 rounded-full
             hover:bg-gray-400 hover:bg-opacity-70 transition"
    >
      &lt;
    </button>

    <!-- Next Button -->
    <button
      id="nextBtnb"
      class="absolute right-0 top-1/2 -translate-y-1/2 z-20
             bg-gray-300 bg-opacity-50 text-white px-3 py-2 rounded-full
             hover:bg-gray-400 hover:bg-opacity-70 transition"
    >
      &gt;
    </button>

    <!-- Carousel -->
    <div
      id="brandCarousel"
      class="flex flex-nowrap gap-6 overflow-x-auto scroll-smooth hide-scrollbar px-12 py-4"
    >
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
        <div
          class="flex-shrink-0 p-4 rounded-2xl transition duration-300 hover:shadow-lg hover:scale-105 {{ $brand['color'] }}"
        >
          <img
            src="{{ asset('images/' . $brand['image']) }}"
            alt="Brand Logo"
            class="w-40 h-40 object-contain"
          >
        </div>
      @endforeach
    </div>
  </div>
</section>



@php
$categories = ['Recommended', 'Free Shipping', 'Same Day Delivery', 'New Arrivals', 'Super Inverter', 'FC Home Exclusive', 'Best Pick'];

$products = [
    [
        'name' => 'TP-Link Tapo L530E',
        'description' => 'Smart Light Bulb, Multicolor',
        'current_price' => '₱349',
        'previous_price' => '₱499',
        'tags' => ['Sale', 'Recommended'],
        'image' => 'tapo-l530e.png',
        'categories' => ['Recommended', 'New Arrivals'],
    ],
    [
        'name' => 'TP-Link Tapo Indoor C210',
        'description' => 'Smart Camera Security Wi-Fi Camera',
        'current_price' => '₱1,279',
        'previous_price' => '₱1,499',
        'tags' => ['New'],
        'image' => 'tapo-c210.png',
        'categories' => ['Free Shipping', 'FC Home Exclusive'],
    ],
    [
        'name' => 'Samsung Smart TV',
        'description' => '4K UHD Smart TV',
        'current_price' => '₱19,999',
        'previous_price' => '₱21,999',
        'tags' => ['Best Pick', 'Super Inverter'],
        'image' => 'samsung-tv.png',
        'categories' => ['Super Inverter', 'Best Pick'],
    ],
    [
        'name' => 'Samsung Smart TV',
        'description' => '4K UHD Smart TV',
        'current_price' => '₱19,999',
        'previous_price' => '₱21,999',
        'tags' => ['Best Pick', 'Super Inverter'],
        'image' => 'samsung-tv.png',
        'categories' => ['Best Pick', 'Same Day Delivery'],
    ],
       [
        'name' => 'TP-Link Tapo Indoor C210',
        'description' => 'Smart Camera Security Wi-Fi Camera',
        'current_price' => '₱1,279',
        'previous_price' => '₱1,499',
        'tags' => ['New'],
        'image' => 'tapo-c210.png',
        'categories' => ['Free Shipping', 'FC Home Exclusive'],
    ],
        [
        'name' => 'TP-Link Tapo L530E',
        'description' => 'Smart Light Bulb, Multicolor',
        'current_price' => '₱349',
        'previous_price' => '₱499',
        'tags' => ['Sale', 'Recommended'],
        'image' => 'tapo-l530e.png',
        'categories' => ['Recommended', 'New Arrivals'],
    ],
        [
        'name' => 'TP-Link Tapo L530E',
        'description' => 'Smart Light Bulb, Multicolor',
        'current_price' => '₱349',
        'previous_price' => '₱499',
        'tags' => ['Sale', 'Recommended'],
        'image' => 'tapo-l530e.png',
        'categories' => ['Recommended', 'New Arrivals'],
    ],

];
@endphp


<!--Category Section -->
<section class="px-6 py-8">

    <!-- Category Filters -->
    <div class="flex flex-wrap gap-15 mb-6 bg-[#477ED254] py-5 justify-center">
        @foreach($categories as $category)
            <button
                class="category-btn px-5 py-2 text-gray-800 rounded-full border-1 font-semibold border-white hover:text-blue-500 hover:bg-white hover:border-blue-500 transition"
                data-category="{{ $category }}"
            >
                {{ $category }}
            </button>
        @endforeach
    </div>

    <!-- Products Grid -->
    <div id="productsGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @foreach($products as $product)
            <div class="product-card Product-sale-container bg-white p-4 rounded-xl shadow-md min-w-[200px] flex-shrink-0"
                 data-categories="{{ implode(',', $product['categories']) }}">
                
                <!-- Tags -->
                <div class="flex gap-2 mb-2 justify-start">
                    @foreach($product['tags'] as $tag)
                        <span class="bg-gray-200 text-gray-700 text-xs font-semibold px-2 py-1 rounded">
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>

                <!-- Product Image -->
                <img src="{{ asset('images/'.$product['image']) }}" 
                     class="w-full h-48 object-contain mb-4 bg-[#F2F2F2] rounded-xl">

                <!-- Product Name -->
                <h3 class="text-md text-[#646464] text-center mb-1">{{ $product['name'] }}</h3>

                <!-- Description -->
                <p class="text-[#717171] text-sm text-center mb-2">{{ $product['description'] }}</p>

                <!-- Prices -->
                <div class="flex items-center gap-2 justify-center">
                    <span class="text-[#434343] font-bold text-lg">{{ $product['current_price'] }}</span>
                    <span class="text-gray-400 line-through text-sm">{{ $product['previous_price'] }}</span>
                </div>
            </div>
        @endforeach
    </div>
</section>




</body>
</html>
