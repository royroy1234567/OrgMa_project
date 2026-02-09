@props([
    'title' => 'Dashboard',
    'icon' => null,
    'searchPlaceholder' => 'Search...',
    'showSearch' => true,
    'showNotifications' => true,
    'showMessages' => true,
    'profileImage' => null,
    'profileName' => 'User'
])

<header id="mainHeader" class="fixed top-0 left-0 md:left-64 right-0 bg-gradient-to-r from-white via-slate-50 to-blue-50/50 backdrop-blur-sm border-b border-slate-200/60 px-6 py-3.5 flex items-center justify-between shadow-lg shadow-slate-200/50 z-50 transition-all duration-300">
    <div class="flex items-center gap-4">
         
        <!-- Burger Menu Button (Mobile only) -->
        <button class="p-2.5 hover:bg-white/80 rounded-xl transition-all duration-200 text-slate-700 hover:text-slate-900 md:hidden active:scale-95 hover:shadow-md" onclick="openSidebarMobile()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
     
        
        <!-- Toggle Sidebar Button (Desktop only) -->
        <button class="p-2.5 hover:bg-[#0052c9] rounded-xl transition-all duration-200 text-white bg-gradient-to-br from-[#004AAD] to-[#0066cc] shadow-md hover:shadow-lg hover:shadow-blue-500/30 active:scale-95" onclick="toggleSidebar()">
            <svg id="toggleIcon" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/>
            </svg>
        </button>
        
        @if($icon)
            <div class="w-11 h-11 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center shadow-sm border border-blue-100">
                {!! $icon !!}
            </div>
        @else
            <div class="w-11 h-11 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center shadow-sm border border-blue-100">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        @endif
        
        <div class="flex items-center gap-3">
            <h1 class="text-2xl font-bold bg-gradient-to-r from-slate-800 to-slate-700 bg-clip-text text-transparent tracking-tight">{{ $title }}</h1>
        </div>
    </div>
    
    <div class="flex items-center gap-3">
        @if($showSearch)
            <div class="relative flex items-center group">
                <svg class="absolute left-3 text-blue-600 group-focus-within:text-blue-700 pointer-events-none transition-colors duration-200" width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" placeholder="{{ $searchPlaceholder }}" class="pl-11 pr-4 py-2.5 w-64 lg:w-80 bg-white/80 backdrop-blur-sm border border-slate-200 rounded-xl text-sm placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-300 focus:bg-white transition-all shadow-sm hover:shadow-md" id="headerSearch">
            </div>
        @endif
        
        <div class="flex items-center gap-1.5">
            @if($showMessages)
                <button class="p-2.5 hover:bg-white/80 rounded-xl transition-all duration-200 text-slate-600 hover:text-blue-600 hover:shadow-md active:scale-95 relative group">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="group-hover:scale-110 transition-transform duration-200">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </button>
            @endif
            
            @if($showNotifications)
                <button class="p-2.5 hover:bg-white/80 rounded-xl transition-all duration-200 text-slate-600 hover:text-blue-600 hover:shadow-md active:scale-95 relative group">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="group-hover:scale-110 transition-transform duration-200">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-gradient-to-br from-red-500 to-red-600 rounded-full ring-2 ring-white animate-pulse"></span>
                </button>
            @endif
            
            <button class="ml-2 group">
                <img src="{{ $profileImage ?? 'https://ui-avatars.com/api/?name=' . urlencode($profileName) . '&background=2563eb&color=fff' }}" 
                     alt="Profile"
                     class="w-10 h-10 rounded-full border-2 border-white shadow-md hover:border-blue-400 transition-all duration-200 group-hover:shadow-lg group-hover:scale-105 ring-2 ring-slate-100">
            </button>
        </div>
    </div>
</header>