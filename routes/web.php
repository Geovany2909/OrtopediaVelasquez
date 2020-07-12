<?php

use App\Product;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        $product = Product::all();
        $user = User::all();
        return view('index', compact('product', 'user'));
    })->name('inicio');

    Route::get('/products', function () {
        $product = Product::all();
        return view('products', compact('product'));
    })->name('products');

    Route::get('/contacts', 'MailController@index')->name('contacts');
    Route::post('/send', 'MailController@send')->name('sendEmail');
});

//ruta que sirve para ver la informacion del usuario logeado
Route::get('admin/users/info', function () {
    return view('admin.users.userInfo');
})->middleware('auth', 'verified')->name('userInfo');

Route::get('admin/products/galery', function () {
    $products = Product::all();
    return view('admin.products.galery', compact('products'));
})->middleware('auth', 'verified')->name('galery');

Auth::routes(['verify' => true]);

Route::get('admin/home', 'HomeController@index')->name('home');
Route::resources([
    'admin/products' => 'productsController',
    'admin/users' => 'usersController'
]);
