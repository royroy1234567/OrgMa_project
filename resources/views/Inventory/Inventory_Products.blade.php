{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css','resources/css/inventory.css' , 'resources/js/Inventory.js'])
</head>
<body class="bg-gray-100">

    {{-- Header --}}
    <x-header title="Inventory" searchPlaceholder="Search users, reports, or logs...">
        <x-slot name="icon">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
        </x-slot>
    </x-header>

    <div class="flex">

        {{-- Sidebar --}}
        <x-sidebar :items="$sidebarItems ?? [
            [
                'label' => 'Dashboard',
                'url' => route('Inventory_dashboard'),
                'active' => 'Inventory_dashboard',
                'page' => 'Inventory_dashboard',
                'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z\' /></svg>'
            ],
            [
                'label' => 'Products',
                'url' => route('Inventory_Products'),
                'active' => 'Inventory_Products',
                'page' => 'Inventory_products',
                'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z\' /></svg>'
            ],
            [
                'label' => 'Returns',
                'url' => route('Inventory_Returns'),
                'active' => 'Inventory_Returns',
                'page' => 'Inventory_returns',
                'icon' => '<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke-width=\'1.5\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3\' /></svg>'
            ]
        ]"
        activePage="{{ request()->route()->getName() === 'Inventory_dashboard' ? 'Inventory_dashboard' : (request()->route()->getName() === 'Inventory_products' ? 'Inventory_products' : 'Inventory_Returns') }}"
        />
     {{-- Main Content --}}
<main class="pt-15 ml-0 md:ml-64 min-h-screen">
    <div class="p-6">
                @yield('content')
                
                {{-- Default content if no @section is defined --}}
                @hasSection('content')
                @else
                <div class="inventory-page">
                    {{-- Create Product Form --}}
                    <div class="page-section">
                        <div class="create-product-container">
                            <h2 class="form-title">Create New Product</h2>
                            
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-layout">
                                    {{-- Left Column: Media Upload --}}
                                    <div class="form-column media-column">
                                        <div class="form-section">
                                            <h3 class="section-label">Media <span class="text-slate-400 text-sm font-normal">(Images or Videos)</span></h3>
                                            
                                            {{-- Main Image Upload --}}
                                            <div class="media-upload-main">
                                                <div class="upload-preview" id="mainPreview">
                                                    <svg class="upload-icon" width="80" height="80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                </div>
                                                <input type="file" id="mainImage" name="main_image" accept="image/*,video/*" class="hidden" onchange="previewMainImage(event)">
                                            </div>
                                            
                                            {{-- Additional Images --}}
                                            <div class="media-upload-grid">
                                                <div class="upload-preview-small" id="preview1">
                                                    <svg class="upload-icon-small" width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                </div>
                                                <input type="file" id="image1" name="images[]" accept="image/*,video/*" class="hidden" onchange="previewImage(event, 'preview1')">
                                                
                                                <div class="upload-preview-small" id="preview2">
                                                    <svg class="upload-icon-small" width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                </div>
                                                <input type="file" id="image2" name="images[]" accept="image/*,video/*" class="hidden" onchange="previewImage(event, 'preview2')">
                                                
                                                <div class="upload-preview-small" id="preview3">
                                                    <svg class="upload-icon-small" width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                </div>
                                                <input type="file" id="image3" name="images[]" accept="image/*,video/*" class="hidden" onchange="previewImage(event, 'preview3')">
                                            </div>
                                            
                                            {{-- Upload Button --}}
                                            <button type="button" class="btn-upload" onclick="document.getElementById('mainImage').click()">
                                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                </svg>
                                                Upload Photo or Video
                                            </button>
                                            
                                            {{-- Quantity Field --}}
                                            <div class="flex flex-col gap-2 mt-6">
                                                <label class=".fc-label">Quantity:</label>
                                                <input type="number" name="quantity" class="fc-input" placeholder="0" min="0">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- Right Column: Product Information --}}
                                    <div class="form-column info-column">
                                        {{-- Basic Information --}}
                                        <div class="form-section">
                                            <h3 class="section-title">Basic Information</h3>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Product Name:</label>
                                                    <input type="text" name="product_name" class="fc-input" placeholder="Enter product name">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Brand:</label>
                                                    <input type="text" name="brand" class="fc-input" placeholder="Enter brand">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Category:</label>
                                                    <select name="category" class="fc-input">
                                                        <option value="">Select category</option>
                                                        <option value="electronics">Electronics</option>
                                                        <option value="appliances">Appliances</option>
                                                        <option value="furniture">Furniture</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Year Made:</label>
                                                    <input type="text" name="year_made" class="fc-input" placeholder="2024">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Inverter Type:</label>
                                                    <input type="text" name="inverter_type" class="fc-input" placeholder="Enter type">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Horsepower(Hp):</label>
                                                    <input type="text" name="horsepower" class="fc-input" placeholder="0">
                                                </div>
                                            </div>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Product Code:</label>
                                                    <input type="text" name="product_code" class="fc-input" placeholder="Enter code">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">SKU:</label>
                                                    <input type="text" name="sku" class="fc-input" placeholder="Enter SKU">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Supplier:</label>
                                                    <input type="text" name="supplier" class="fc-input" placeholder="Enter supplier">
                                                </div>
                                            </div>
                                            
                                            <div class="flex flex-col gap-2 full-width">
                                                <label class=".fc-label">Description:</label>
                                                <textarea name="description" class="px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none border-slate-400" rows="4" placeholder="Enter product description"></textarea>
                                            </div>
                                        </div>
                                        
                                        {{-- Pricing --}}
                                        <div class="form-section">
                                            <h3 class="section-title">Pricing</h3>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Cost Price:</label>
                                                    <input type="number" step="0.01" name="cost_price" class="fc-input" placeholder="₱ 0.00">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Selling Price:</label>
                                                    <input type="number" step="0.01" name="selling_price" class="fc-input" placeholder="₱ 0.00">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Discount Percentage:</label>
                                                    <input type="number" step="0.01" name="discount_percentage" class="fc-input" placeholder="0%">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        {{-- Physical Attributes --}}
                                        <div class="form-section">
                                            <h3 class="section-title">Physical Attributes</h3>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Weight:</label>
                                                    <input type="text" name="weight" class="fc-input" placeholder="0 kg">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Color:</label>
                                                    <input type="text" name="color" class="fc-input" placeholder="Enter color">
                                                </div>
                                            </div>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Dimension:</label>
                                                    <input type="text" name="dimension" class="fc-input" placeholder="L x W x H">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class=".fc-label">Size:</label>
                                                    <input type="text" name="size" class="fc-input" placeholder="Enter size">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                {{-- Form Actions --}}
                                <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-200">
                                    <button type="button" class="btn-cancel" onclick="window.location.href='#'">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn-submit">
                                        Add Product
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </main>
    </div>

    {{-- Mobile menu toggle --}}
    <script>
        const toggleSidebar = () => {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('open');
        };
    </script>
</body>
</html>