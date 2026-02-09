@props(['items' => [], 'activePage' => ''])

<aside id="sidebar" class="fixed left-0 top-0 h-screen bg-gradient-to-b from-[#004AAD] via-[#0052c9] to-[#004AAD] text-white flex flex-col z-50 transition-all duration-300 w-64 shadow-2xl">
    <!-- Logo Section -->
    <div class="flex items-center justify-center py-6 relative">
        <div class="absolute inset-0 bg-white/5 backdrop-blur-sm"></div>
        <img src="{{ asset('images/HOME_CENTER1.png') }}"
             id="sidebarLogo"
             class="w-20 h-20 rounded-full border-4 border-white/90 transition-all duration-300 shadow-xl relative z-10 ring-4 ring-white/20"
             alt="Logo">
    </div>
    
    <nav class="flex flex-col gap-1.5 mt-4 px-3 pb-4">
        @foreach($items as $item)
            @php
                $isActive = $activePage === ($item['page'] ?? '') || request()->is($item['active'] ?? '');
            @endphp
            <a 
                href="{{ $item['url'] }}" 
                class="sidebar-item flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-200 ease-in-out group {{ $isActive ? 'bg-white text-[#004AAD] shadow-lg shadow-blue-900/30 font-semibold' : 'text-white/90 hover:bg-white/10 hover:text-white hover:shadow-md backdrop-blur-sm' }}"
                title="{{ $item['label'] }}"
            >
                @if(isset($item['icon']))
                    <span class="w-5 h-5 flex flex-shrink-0 {{ $isActive ? 'text-[#004AAD]' : 'text-white/80 group-hover:text-white group-hover:scale-110' }} transition-all duration-200">{!! $item['icon'] !!}</span>
                @endif
                <span class="sidebar-label text-base font-medium whitespace-nowrap {{ $isActive ? 'text-[#004AAD]' : '' }}">{{ $item['label'] }}</span>
                
                @if($isActive)
                    <span class="sidebar-indicator ml-auto w-2 h-2 bg-[#004AAD] rounded-full shadow-md animate-pulse"></span>
                @endif
            </a>
        @endforeach
    </nav>
</aside>

<!-- Overlay for mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 hidden transition-opacity duration-300" onclick="closeSidebarMobile()"></div>

<script>
let sidebarMinimized = false;

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const toggleIcon = document.getElementById('toggleIcon');
    const sidebarLogo = document.getElementById('sidebarLogo');
    const labels = document.querySelectorAll('.sidebar-label');
    const indicators = document.querySelectorAll('.sidebar-indicator');
    
    // Desktop behavior - minimize/expand
    sidebarMinimized = !sidebarMinimized;
    
    if (sidebarMinimized) {
        sidebar.classList.add('md:w-20');
        sidebar.classList.remove('md:w-64');
        sidebarLogo.classList.add('w-12', 'h-12');
        sidebarLogo.classList.remove('w-20', 'h-20');
        toggleIcon.style.transform = 'rotate(180deg)';
        
        // Hide labels and indicators
        labels.forEach(label => {
            label.classList.add('opacity-0', 'w-0', 'overflow-hidden');
        });
        indicators.forEach(indicator => {
            indicator.classList.add('hidden');
        });
    } else {
        sidebar.classList.remove('md:w-20');
        sidebar.classList.add('md:w-64');
        sidebarLogo.classList.remove('w-12', 'h-12');
        sidebarLogo.classList.add('w-20', 'h-20');
        toggleIcon.style.transform = 'rotate(0deg)';
        
        // Show labels and indicators
        labels.forEach(label => {
            label.classList.remove('opacity-0', 'w-0', 'overflow-hidden');
        });
        indicators.forEach(indicator => {
            indicator.classList.remove('hidden');
        });
    }
    
    // Update main content margin
    updateContentMargin();
}

function openSidebarMobile() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    
    sidebar.classList.remove('-translate-x-full');
    overlay.classList.remove('hidden');
}

function closeSidebarMobile() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
}

function updateContentMargin() {
    const header = document.getElementById('mainHeader');
    const mainContent = document.querySelector('main') || document.querySelector('.main-content');
    
    if (window.innerWidth >= 768) {
        if (sidebarMinimized) {
            if (header) header.style.left = '5rem';
            if (mainContent) mainContent.style.marginLeft = '5rem';
        } else {
            if (header) header.style.left = '16rem';
            if (mainContent) mainContent.style.marginLeft = '16rem';
        }
    }
}

// Reset sidebar state on window resize
window.addEventListener('resize', function() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    
    if (window.innerWidth >= 768) {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.add('hidden');
        updateContentMargin();
    } else {
        // Reset to full width on mobile
        sidebar.classList.add('-translate-x-full');
        sidebarMinimized = false;
    }
});

// Initial state - hide on mobile
if (window.innerWidth < 768) {
    document.getElementById('sidebar').classList.add('-translate-x-full');
}
</script>

<style>
/* Sidebar transitions */
#sidebar {
    transition: width 0.3s ease-in-out, transform 0.3s ease-in-out;
}

.sidebar-label {
    transition: opacity 0.2s ease-in-out, width 0.2s ease-in-out;
}

/* Smooth overlay transition */
#sidebarOverlay {
    transition: opacity 0.3s ease-in-out;
}
</style>