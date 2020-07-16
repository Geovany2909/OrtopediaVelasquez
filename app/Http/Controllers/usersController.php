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
        $users = User::simplePaginate(4);
        $users = User::orderBy('id', 'DESC')->name($name)->simplePaginate();
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
            $img->resize(320, 240)->save(public_path('images/users/' . $temp_name));
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
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

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
            $img->resize(320, 240)->save(public_path('images/' . $temp_name));
            $input['photo'] = $temp_name;
        }
        $users->update($input);
        Alert::info('Actualizado', "El usuario $users->email ha sido actualizado exitosamente");
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        if ($users->photo) {
            $originalRut = $users->photo;
            $originalFile = public_path() . "/images/users/" . $originalRut;
            unlink($originalFile);
        }
        $users->delete();
        Alert::error('Eliminado', "El usuario '$users->email' fue eliminado  correctamente");
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



    public function updateUserAuth(validateAuthUser $request, $id)
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
                    $originalFile = public_path() . "/images/users/" . $originalRout;
                    unlink($originalFile);
                }

                $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
                $img = \Image::make($file);
                $img->resize(320, 240)->save(public_path('images/users/' . $temp_name));
                $input['photo'] = $temp_name;
            }
            $users->update($input);
            Alert::info('Actualizado', "El usuario $users->email ha sido actualizado exitosamente");
            return redirect()->route('users.index');
        } else {
            toast('Contraseña Incorrecta','warning')->timerProgressBar()->position('center');
            return redirect()->route('userInfo', $users->id);
        }
    }
}
