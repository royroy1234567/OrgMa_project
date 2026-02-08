<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Landing');
});

Route::get('/Login', function () {
    return view('Login');
});

Route::get('/Register', function () {
    return view('Register');
});

Route::get('/Profile', function () {
    return view('User_Profile', [
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

Route::get('/U_MyPurchase', function () {
    return view('User_MyPurchase', [
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

Route::get('/U_OrderHistory', function () {
    return view('User_OrderHistory', [
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

Route::get('/U_Cart', function () {
    return view('User_Cart');
});

Route::get('/User_Checkout', function () {
    return view('User_Checkout'); // or 'checkout'
})->name('checkout');

Route::get('/U_ViewProduct', function () {
    return view('User_ViewProduct');
});