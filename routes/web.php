<?php

use App\Product;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

/************Paginas Principales********************** */
Route::get('/', function () {
    $product = Product::all();
    $user = User::all();
    return view('index', compact('product', 'user'));
})->name('inicio');

Route::get('/products', function (Request $request) {
    if($request->ajax()){
        $ajax = Product::all();
        return response()->json($ajax);
    }
    $products = Product::all();
    return view('products', compact('products'))->render();
});
Route::get('/products/{category?}', function (Request $request, $category) {
    if ($request->ajax()) {
        $ajax = Product::where('category', $category)->get();
        return response()->json($ajax);
    }
})->name('products');


Route::get('/products/image/casco-de-bebe/', function () {
    return view('OnlyProduct');
})->name('viewOnlyProduct');

Route::get('/galery/{id?}', function (Request $request, $id = null) {
    if ($request->ajax()) {
        $ajax = Product::where('id', $id)->first();
        return response()->json($ajax);
    }
    $products = Product::all();
    return view('galeria', compact('products'));
})->name('galeryPrincipal');

Route::get('/saberMas', function () {
    return view('saberMas');
})->name('saberMas');

Route::get('/contacts', 'MailController@index')->name('contacts');
Route::get('/contacts/p={name}', 'MailController@productName')->name('contactsName');
Route::get('/contacts/cascos-de-bebes', function(){
    $cascos = ['name'=>'Cascos de bebe'];
    return view('contactenos', compact('cascos'));
})->name('contactsCascos');
Route::post('/send', 'MailController@send')->name('sendEmail');

/****************************************************** */


/*********ruta que sirve para ver la informacion del usuario logeado y editar*******/
Route::get('admin/users/info/{id}', function ($id) {
    $user = User::findOrFail($id);
    return view('admin.users.userInfo', compact('user'));
})->name('userInfo');
Route::patch('admin/users/updateUserAuth/{id}', 'usersController@updateUserAuth')->name('updateUserAuth');
/*************************************************************/


//Ruta de la galeria y sus procesos
Route::get('admin/products/galery', 'productsController@galery')->name('galery');
Route::get('admin/products/showOnlyProduct/{id}', 'productsController@showOnlyProduct')->name('showOnlyProduct');
Route::patch('admin/products/updateOnlyProduct/{id}', 'productsController@updateOnlyProduct')->name('updateOnlyProduct');

//hace que los usuarios verifiquen su identidad mediante el email
Auth::routes(['verify' => true]);

Route::get('admin/home', 'HomeController@index')->name('home');
Route::resources([
    'admin/products' => 'productsController',
    'admin/users' => 'usersController'
]);
