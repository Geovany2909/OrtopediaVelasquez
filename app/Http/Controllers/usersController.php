<?php

namespace App\Http\Controllers;

use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ValidateFormUsers;
use App\Http\Requests\UpdateUserRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        Carbon::setLocale('es');
    }

    public function index()
    {
        $users = User::simplePaginate(4);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(ValidateFormUsers $request)
    {
        $input = $request->all();

        if ($file = $request->file('photo')) {
            $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
            $img = \Image::make($file);
            $img->resize(320, 240)->save(public_path('imgUsers/' . $temp_name));
            $input['photo'] = $temp_name;
        }
        $password = $request->password;
        $input['password'] = bcrypt($password);

        User::create($input);
        Alert::success('Agregado', 'El usuario se ha agregado correctamente');
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.destroy', compact('user'));
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.edit', compact('users'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $input = $request->only('name', 'email', 'photo');
        $pass = $request->input('password');
        $credentials = Auth::user();
        $users = User::findOrfail($id);
        /*/
        *
        * Compueba que la contraseña insertada en el form
        *       es igual a la de la base de datos
        */
        if (Hash::check($pass, $credentials->getAuthPassword())) {
            //Verifica si hay una foto en el form y elimina la existente
            if ($file = $request->file('photo')) {
                if ($users->photo) {
                    $originalRout = $users->photo;
                    $originalFile = public_path() . "/imgUsers/" . $originalRout;
                    unlink($originalFile);
                }

                $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
                $img = \Image::make($file);
                $img->resize(320, 240)->save(public_path('images/' . $temp_name));
                $input['photo'] = $temp_name;
            }
            $users->update($input);
            Alert::info('Actualizado', "El usuario $users->name ha sido actualizado exitosamente");
            return redirect() - route('users.index');
        } else {
            Alert::warning('Error', 'La contraseña es incorrecta');
            return redirect()->route('users.edit', $users->id);
        }
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        if ($users->photo) {
            $originalRut = $users->photo;
            $originalFile = public_path() . "/images/" . $originalRut;
            unlink($originalFile);
        }
        $users->delete();
        Alert::error('Eliminado', "El usuario '$users->name' fue eliminado  correctamente");
        return redirect()->route('users.index');
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
