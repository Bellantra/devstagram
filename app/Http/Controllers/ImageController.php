<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ImageController extends Controller
{
    public function store(Request $request)
    {
        //imagen en memoria   
        $image = $request->file('file');
        //se arma el nombre unico de la imagen con su extension
        $nameImg = Str::uuid() . "." . $image->extension();

        //imagen con formato que se va a guardar
        $serverImg = Image::make($image);
        $serverImg->fit(1000, 1000);

        $imagePath = public_path('uploads') . '/' . $nameImg;
        //guardo imagen formateada en pathinfo
        $serverImg->save($imagePath);
        return response()->json(['img' => $nameImg]);
    }
}
