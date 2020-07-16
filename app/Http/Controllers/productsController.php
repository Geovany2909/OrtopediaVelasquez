<?php

namespace App\Http\Controllers;

use App\Product;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\validateFormProducts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class productsController extends Controller
{

    //solo se puede acceder a este controlador si el usuario esta autenticado
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        Carbon::setlocale('es');
    }

    public function index(Request $request)
    {
        $name  = $request->get('name');
        //$category = $request->get('category');

        $products = Product::simplePaginate(4);
        $products = Product::orderBy('id', 'DESC')
    		->name($name)
    		->simplePaginate(4);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }


    public function store(validateFormProducts $request)
    {
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
            $img = \Image::make($file);
            $img->resize(320, 240)->save(public_path('images/products/' . $temp_name));
            $input['photo'] = $temp_name;
        }
        Product::create($input);
        Alert::success('Exito!', 'Producto Creado Correctamente');
        return redirect()->route('products.index');
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.destroy', compact('product'));
    }
    public function showOnlyProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.showOnlyProduct', compact('product'));
    }

    public function updateOnlyProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate(
            ['photo' => 'required|image']
        );
        $file = $request->file('photo');
        $input = $request->only('photo');

        if ($file) {
            if ($product->photo) {
                $name = $product->photo;
                $dropFile = public_path() . "/images/products/" . $name;
                unlink($dropFile);
            }
            $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
            $img = \Image::make($file);
            $img->resize(320, 240)->save(public_path('images/products/' . $temp_name));
            $input['photo'] = $temp_name;
        }
        $product->update($input);
        Alert::success('Actualizado!', 'la imagen fue actualizada');
        return redirect()->route('galery');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(ValidateFormProducts $request, $id)
    {
        $products = Product::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('photo')) {
            //verifica si anteriormente tiene una foto y procede a eliminarla para añadir una nueva
            if ($products->photo) {
                $name = $products->photo;
                $dropFile = public_path() . "images/products/" . $name;
                unlink($dropFile);
            }
            $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
            $img = \Image::make($file);
            $img->resize(320, 240)->save(public_path('images/products/' . $temp_name));
            $input['photo'] = $temp_name;
        }

        $products->update($input);
        Alert::info('Actualizado', 'El producto ha sido actualizado');
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        if ($products->photo) {
            $name = $products->photo;
            $dropFile = public_path() . "/images/products/" . $name;
            unlink($dropFile);
        }
        $products->delete();
        Alert::error('Eliminado', 'El producto se ha eliminado');
        return redirect('admin/products');
    }

    public function galery(Request $request)
    {
        $name  = $request->get('name');
        $products = Product::simplePaginate(4);
        $products = Product::orderBy('id', 'DESC')
    		->name($name)
    		->simplePaginate(4);
        return view('admin.products.galery', compact('products'));
    }
    protected function random_string()
    {
        $key = '';
        $keys = array_merge(range('a', 'z'), range(0, 15));
        for ($i = 0; $i < 15; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }
}
