<?php

namespace App\Http\Controllers;

use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\validateFormUsers;
use App\Http\Requests\validateUpdateFormUserAuth as validateAuthUser;
use Carbon\Carbon;
use App\Http\Requests\validateUpdateFormUserless as validateUserless;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        Carbon::setLocale('es');
    }

    public function index(Request $request)
    {
        $name = $request->get('name');
        $users = User::orderBy('id', 'DESC')->name($name)->simplePaginate(4);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(validateFormUsers $request)
    {
        $input = $request->all();

        if ($file = $request->file('photo')) {
            $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
            $img = \Image::make($file);
            $img->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/users/'. $temp_name ));
            $input['photo'] = $temp_name;
        }
        $password = $request->password;
        $input['password'] = bcrypt($password);

        User::create($input);
        Alert::success('Éxito!', 'El usuario se ha agregado correctamente');
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.destroy', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    //actualiza a usuarios no logeados
    public function update(validateUserless $request, $id)
    {
        $input = $request->only('name', 'email', 'photo');
        $users = User::findOrFail($id);
        if ($file = $request->file('photo')) {
            if ($users->photo) {
                $originalRout = $users->photo;
                $originalFile = public_path() . "/images/users/" . $originalRout;
                unlink($originalFile);
            }
            $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
            $img = \Image::make($file);
            $img->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/users/'. $temp_name ));
            $input['photo'] = $temp_name;
        }
        $users->update($input);
        Alert::info('Éxito!', "El usuario $users->email ha sido actualizado exitosamente");
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        if ($originalName = $users->photo) {
            $originalFile = public_path() . "/images/users/" . $originalName;
            unlink($originalFile);
        }
        $users->delete();
        Alert::error('Éxito!', "El usuario $users->email fue eliminado correctamente");
        return redirect()->route('users.index');
    }

    public function showInfoUser($id)
    {
        $user = User::find($id);
        return view('admin.users.userInfo', compact('user'));
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

    //actualiza a el usuario  logeado
    public function updateUserAuth(validateAuthUser $request, $id)
    {
        $input = $request->only('name', 'email', 'photo');
        $pass = $request->input('password');
        $credentials = Auth::user();
        $users = User::findOrfail($id);
        /*/
        *
        * Compueba que la contraseña del request
        *       es igual a la de la base de datos
        */
        if (Hash::check($pass, $credentials->getAuthPassword())) {
            //Verifica si hay una foto en el form y elimina la existente
            if ($file = $request->file('photo')) {
                if ($originalName  = $users->photo) {
                    $originalFile = public_path() . "/images/users/" . $originalName;
                    unlink($originalFile);
                }

                $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
                $img = \Image::make($file);
                $img->resize(150, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/images/users/'. $temp_name ));
                $input['photo'] = $temp_name;
            }
            $users->update($input);
            Alert::info('Actualizado', "El usuario $users->email ha sido actualizado exitosamente");
            return redirect()->route('home');
        } else {
            toast('Contraseña incorrecta','warning')->timerProgressBar()->position('center');
            return redirect()->back();
        }
    }
}
