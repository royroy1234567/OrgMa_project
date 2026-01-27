<?php

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

