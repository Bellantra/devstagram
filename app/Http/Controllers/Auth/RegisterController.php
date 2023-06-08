<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class RegisterController extends Controller
{
    //

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //dd($request->get('username'));

        //Modify Request
        $request->request->add(['username' => Str::slug($request->username)]); //Para que valide con la conversion que no este duplicada antes de intentar crear

        //Validation
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'username' => ['required', 'min:3', 'unique:users', 'max:20'],
            'email' => ['required', 'unique:users', 'email', 'max:30'],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        //Redirect
        return redirect()->route('post.index');

        //dd('Usuario Creado...');
    }
}
