<?php

use App\Product;
use App\User;

// /*
// *
// Grupo de rutas que sirven para los clientes sin registro...
// *
// */
// Route::middleware(['guest'])->group(function(){
//     Route::get('/', function () {
//         $product = Product::all();
//         $user = User::all();
//         return view('index', compact('product','user'));
//     })->name('inicio');

//     Route::get('/products', function () {
//         $product = Product::all();
//         return view('products', compact('product'));
//     })->name('products');

// });

// /*
// *
// Ambas rutas sirven para el envio de correo desde el form de contacto
// *
// */
// Route::get('/contacts', 'MailController@index')->name('contacts');
// Route::post('/send', 'MailController@send')->name('sendEmail');

// /*
// *
// Rutas completas para la autenticacion
// *
// */
// Auth::routes();

// /*
// *
// Grupo de rutas con ciertas restricciones, especificamente para usuarios autenticados
// *
// // */
// // Route::middleware(['auth', 'verified', 'throttle:60,1'])->group(function () {

//     Route::get('/admin/home', 'HomeController@index')->name('home');
//     Route::resources([
//         "admin/products" => 'productsController',
//         "admin/users" => 'usersController',
//     ]);

//     Route::get('/admin/users/showInfoUser', function () {
//         return view('admin.users.showInfo');
//     })->name('infoUser');

// // });
// Route::get('/admin/products/galery', function () {
//     return view('admin.home');
// })->middleware('auth');

//pruebas

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

Auth::routes(['verify'=>true]);

Route::get('admin/home', 'HomeController@index')->name('home');
Route::resources([
    'admin/products' => 'productsController',
    'admin/users' => 'usersController'
]);
