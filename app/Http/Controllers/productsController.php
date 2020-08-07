<?php

namespace App\Http\Controllers;

use App\Product;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\validateFormProducts as createValidation;
use App\Http\Requests\validateUpdateFormProducts as updateValidation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Validator;
use Response;

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
        $products = Product::orderBy('id', 'ASC')
            ->name($name)
            ->simplePaginate(4);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(createValidation $request)
    {
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
            $img = \Image::make($file);
            $img->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/products/' . $temp_name));
            $input['photo'] = $temp_name;
        }
        Product::create($input);
        Alert::success('Éxito!', 'Producto creado correctamente');
        return redirect()->route('products.index');
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.destroy', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(updateValidation $request, $id)
    {
        $products = Product::findOrFail($id);
        $input = $request->only('name', 'category', 'price', 'description');
        $products->update($input);
        Alert::info('Éxito!', 'El producto ha sido actualizado');
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
        Alert::error('Éxito!', 'El producto se ha eliminado');
        return redirect()->route('products.index');
    }

    public function galery(Request $request)
    {
        $name  = $request->get('name');
        $products = Product::orderBy('id', 'ASC')->name($name)->get();
        return view('admin.products.galery', compact('products'));
    }
    public function showOnlyProduct(Request $request, $id)
    {
        if ($request->ajax()) {
            $product = Product::findOrFail($id);
            return response()->json($product, 200);
        }
    }

    public function updateOnlyProduct(Request $request, $id)
    {
        if ($request->has('photo')) {
            $validator = Validator::make($request->all(), [
                'photo' => 'image',
            ]);
            if ($validator->fails()) {
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
            } else {
                $input = $request->only('photo');
                $product = Product::findOrFail($id);
                $file = $request->file('photo');

                if ($file) {
                    if ($name = $product->photo) {
                        $dropFile = public_path() . "/images/products/" . $name;
                        unlink($dropFile);
                    }

                    $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
                    $img = \Image::make($file);
                    $img->resize(400, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('/images/products/' . $temp_name));
                    $input['photo'] = $temp_name;
                }
                $product->update($input);
                Alert::success('Exito!', 'la imagen fue actualizada');
                return redirect()->route('galery');
            }
        } else {
            alert::info("Error!", "No se selecciono ningun archivo");
            return redirect()->route('galery');
        }
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
