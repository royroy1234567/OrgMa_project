<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;
use Termwind\Components\Raw;

Route::get('/', function () {
    return view('Landing');
});

Route::get('/Login', function () {
    return view('Login');
});

Route::get('/Register', function () {
    return view('Register');
});

Route::get('/User_Profile', function () {
    return view('User.User_Profile', [
        'user' => [
            'name' => 'John D. Doe',
            'age' => 26,
            'gender' => 'Male',
            'birthday' => 'January / 01 / 2000',
            'email' => 'johnddoe@gmail.com',
            'phone' => '+63 987 654 3210',
            'address' => 'Blk 00 Lot 00 Python St. Monty Village, Espania, Brgy 000, Manila',
            'avatar' => 'https://ui-avatars.com/api/?name=John+Doe&size=120&background=64B5F6&color=fff'
        ]
    ]);
});
Route::get('/User_MyPurchase', function () {
    return view('User.User_MyPurchase', [
        'user' => [
            'name' => 'John D. Doe',
            'age' => 26,
        ],  // ← Add comma here

        // Example purchases data - in real app, fetch from database
        'purchases' => [
            [
                'id' => 1,
                'seller_name' => 'TCL',
                'badges' => ['Mall', 'Chat'],
                'status' => 'To Pay',
                'product_name' => 'TCL QLED 55P8K',
                'product_description' => '55-inch 4K QLED Google TV with FreeSync and Dolby Atmos Television',
                'product_image' => 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=200&h=150&fit=crop',
                'quantity' => 1,
                'price' => 24990,
                'filter_status' => 'to-pay'
            ],
            [
                'id' => 2,
                'seller_name' => 'Samsung',
                'badges' => ['Official Store', 'Chat'],
                'status' => 'To Ship',
                'product_name' => 'Samsung Galaxy S24 Ultra',
                'product_description' => '256GB, Phantom Black, with S Pen',
                'product_image' => 'https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=200&h=150&fit=crop',
                'quantity' => 1,
                'price' => 69990,
                'filter_status' => 'to-ship'
            ],
            // ...existing code...
        ]
    ]);
});

Route::get('/User_OrderHistory', function () {
    return view('User.User_OrderHistory', [
        'user' => [
            'name' => 'John D. Doe',
            'age' => 26,
        ],  // ← Add comma here

        // Example purchases data - in real app, fetch from database
        'histories' => [
            [
                'id' => 3,
                'seller_name' => 'TCL',
                'badges' => ['Mall', 'Chat'],
                'status' => 'Completed',
                'product_name' => 'TCL QLED 55P8K',
                'product_image' => 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=200&h=150&fit=crop',
                'quantity' => 1,
                'price' => 24990,
                'filter_status' => 'completed'
            ],
            // ...existing code...
        ]
    ]);
});

Route::get('/User_Cart', function () {
    return view('User.User_Cart');
});

Route::get('/User_Checkout', function () {
    return view('User.User_Checkout'); // or 'checkout'
})->name('checkout');

Route::get('/User_ViewProduct', function () {
    return view('User.User_ViewProduct');
});


Route::get('/Inventory_dashboard', function () {
    return view('Inventory.Inventory_dashboard');
})->name('Inventory_dashboard');


Route::get('/Inventory_Products', function () {
    return view('Inventory.Inventory_Products');
})->name('Inventory_Products');   



Route::get('/Inventory_Returns', function () {
    return view('Inventory.Inventory_Returns');
}) ->name('Inventory_Returns');

Route::get('/Manager_Branch', function () {
    return view('Manager.Manager_Branch');
})->name('Manager_Branch');

Route::get('/Manager_inventory', function () {
    return view('Manager.Manager_inventory');
})->name('Manager_inventory');

Route::get('/Manager_Sales', function () {
    return view('Manager.Manager_Sales');
})->name('Manager_Sales');

Route::get('/Manager_Reports', function () {
    return view('Manager.Manager_Reports');
})->name('Manager_Reports');

Route::get('/Manager_Return', function () {
    return view('Manager.Manager_Return');
}) ->name('Manager_Return');

Route::get('/Manager_dashboard', function () {
    return view('Manager.Manager_dashboard');
})->name('Manager_dashboard');

Route::get('/Manager_Customers', function () {
    return view('Manager.Manager_Customers');
})->name('Manager_Customers');

Route::get('/Manager_Orders', function () {
    return view('Manager.Manager_Orders');
})->name('Manager_Orders');

Route::get('/Manager_Settings', function () {
    return view('Manager.Manager_Settings');
})->name('Manager_Settings');

Route::get('/Cashier_Order', function () {
    return view('Cashier.Cashier_Order');
})->name('Cashier_Order');

Route::get('/Cashier_Pointsale', function () {
    return view('Cashier.Cashier_Pointsale');
})->name('Cashier_Pointsale');

Route::get('/Admin_Dashboard', function () {
    return view('Admin.Admin_Dashboard');
})->name('Admin_Dashboard');

Route::get('/Admin_Settings', function () {
    return view('Admin.Admin_Settings');
})->name('Admin_Settings');

Route::get('/Admin_Users', function () {
    return view('Admin.Admin_Users');
})->name('Admin_Users');

Route::get('/Admin_Logs', function () {
    return view('Admin.Admin_Logs');
})->name('Admin_Logs');

Route::get('/Admin_Roles', function () {
    return view('Admin.Admin_Roles');
})->name('Admin_Roles');

Route::get('/Admin_Branch', function () {
    return view('Admin.Admin_Branch');
})->name('Admin_Branch');

Route::get('/Admin_Inventory', function () {
    return view('Admin.Admin_Inventory');
})->name('Admin_Inventory');

Route::get('/Admin_Reports', function () {
    return view('Admin.Admin_Reports');
})->name('Admin_Reports');

Route::get('/Admin_Sales', function () {
    return view('Admin.Admin_Sales');
})->name('Admin_Sales');

Route::get('/Admin_Security', function () {
    return view('Admin.Admin_Security');
})->name('Admin_Security');

Route::get('/Admin_Access', function () {
    return view('Admin.Admin_Access');
})->name('Admin_Access');

Route::get('/Crm_Analytics', function () {
    return view('CRM.CRM_Analytics');
})->name('CRM_Analytics');

Route::get('/CRM_Dashboard', function () {
    return view('CRM.CRM_Dashboard');
})->name('CRM_Dashboard');

Route::get('/CRM_Communications', function () {
    return view('CRM.CRM_Communications');
})->name('CRM_Communications');

Route::get('/CRM_Return', function () {
    return view('CRM.CRM_Return');
})->name('CRM_Return');

Route::get('/CRM_Feedback', function () {
    return view('CRM.CRM_Feedback');
})->name('CRM_Feedback');

Route::get('/Procurement_Dashboard', function () {
    return view('Procurement.Procurement_Dashboard');
})->name('Procurement_Dashboard');

Route::get('/Procurement_PurchaseOrder', function () {
    return view('Procurement.Procurement_PurchaseOrder');
})->name('Procurement_PurchaseOrder');

Route::get('/Procurement_Supplier', function () {
    return view('Procurement.Procurement_Supplier');
})->name('Procurement_Supplier');

Route::get('/Procurement_ReordersAlert', function () {
    return view('Procurement.Procurement_ReordersAlert');
})->name('Procurement_ReordersAlert');

Route::get('/Procurement_ReceivingHistory', function () {
    return view('Procurement.Procurement_ReceivingHistory');
})->name('Procurement_ReceivingHistory');

Route::get('/Procurement_Budget', function () {
    return view('Procurement.Procurement_Budget');
})->name('Procurement_Budget');