<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }
   
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
         //Modify Request
         $request->request->add(['username' => Str::slug($request->username)]); //Para que valide con la conversion que no este duplicada antes de intentar crear 
          
       $this->validate($request,[
         'username' => ['required', 'unique:users,username,'.auth()->user()->id,'min:3','max:20','not_in:edit-profile'],
         
       ]);
       if($request->image){
         //imagen en memoria   
         $image = $request->file('image');
         //se arma el nombre unico de la imagen con su extension
         $nameImg = Str::uuid() . "." . $image->extension();
 
         //imagen con formato que se va a guardar
         $serverImg = Image::make($image);
         $serverImg->fit(1000, 1000);
 
         $imagePath = public_path('profile') . '/' . $nameImg;
         //guardo imagen formateada en pathinfo
         $serverImg->save($imagePath);
       }

       //Guardar cambios

       $user = User::find(auth()->user()->id);
       $user->username = $request->username;
       $user->image = $nameImg ?? auth()->user()->imagen ?? null;
       $user->save();

       //Redireccionar al usuario 
       return redirect()->route('post.index',$user->username);
    }
}
