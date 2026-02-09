<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    @vite(['resources/css/app.css'])
</head>

<body>
<nav class="bg-[#004AAD] rounded-b-2xl">
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
           class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 pointer-events-none"
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

    <!-- Main Content -->


    <!-- Back -->
      <div class=" md:flex items-center gap-6 mr-4 py-5 px-10">
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
            <a href="/Profile" class="px-6 py-2 bg-blue-700 border-3 border-blue-900 text-white rounded-full font-medium">
                Profile
            </a>
            <a href="./U_MyPurchase" class="px-6 py-2 text-gray-600 hover:text-blue-800 font-medium">
                My Purchase
            </a>
            <a href="./U_OrderHistory" class="px-6 py-2 text-gray-600 hover:text-blue-800 font-medium">
                Order History
            </a>
        </div>

        <!-- Personal Data Section -->
        <div class="bg-gray-100 rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Personal Data</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="flex items-center justify-between p-4 border-b border-gray-300">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="text-gray-800">{{ $user['name'] }}</span>
                    </div>
                    <button onclick="editField('name')" class="flex items-center gap-1 text-gray-600 hover:text-blue-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Edit
                    </button>
                </div>

                <!-- Gender -->
                <div class="flex items-center justify-between p-4 border-b border-gray-300">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="text-gray-800">{{ $user['gender'] }}</span>
                    </div>
                    <button onclick="editField('gender')" class="flex items-center gap-1 text-gray-600 hover:text-blue-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Edit
                    </button>
                </div>

                <!-- Birthday -->
                <div class="flex items-center justify-between p-4 border-b border-gray-300">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-800">{{ $user['birthday'] }}</span>
                    </div>
                    <button onclick="editField('birthday')" class="flex items-center gap-1 text-gray-600 hover:text-blue-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Edit
                    </button>
                </div>

                <!-- Address -->
                <div class="flex items-center justify-between p-4 border-b border-gray-300">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-gray-800 text-sm">{{ $user['address'] }}</span>
                    </div>
                    <button onclick="editField('address')" class="flex items-center gap-1 text-gray-600 hover:text-blue-700 shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Edit
                    </button>
                </div>

                <!-- Email -->
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-800">{{ $user['email'] }}</span>
                    </div>
                    <button onclick="editField('email')" class="flex items-center gap-1 text-gray-600 hover:text-blue-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Edit
                    </button>
                </div>

                <!-- Phone -->
                <div class="flex items-center justify-between p-4 ">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-gray-800">{{ $user['phone'] }}</span>
                    </div>
                    <button onclick="editField('phone')" class="flex items-center gap-1 text-gray-600 hover:text-blue-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Edit
                    </button>
                </div>
            </div>
        </div>

        <!-- Login and Password Section -->
        <div class="bg-gray-100 rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Login and Password</h2>
            
            <div class="space-y-4">
                <!-- Check Account Activity -->
                <a href="#" class="w-full flex items-center justify-between p-4 border-b border-gray-300 hover:bg-gray-50 transition">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-left">
                            <div class="text-gray-800 font-medium">Check Account Activity</div>
                            <div class="text-sm text-gray-500">Check your login and account changes in the last 30 days</div>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <!-- Password -->
                <a href="#" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                        <div class="text-left">
                            <div class="text-gray-800 font-medium">Password</div>
                            <div class="text-sm text-gray-500">••••••••</div>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <script>
        function editField(field) {
            // Add your edit functionality here
            console.log('Editing field:', field);
            // You can redirect to an edit page or open a modal
            window.location.href = `/profile/edit/${field}`;
        }
    </script>

</body>
</html>