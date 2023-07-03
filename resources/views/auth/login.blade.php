@extends('layouts.app')

@section('title')
  Login in DevStagram
@endsection

@section('content')
<div class="md:flex justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{asset('img/login.jpg')}}" alt="">
    </div>

    <div class="md:w-4/12 bg-white p-5 rounded-lg shadow-xl">
      <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf  
        @if(session('msg'))
        <p class=" bg-red-500 text-white my-1 rounded-lg text-xs p-1 text-center">{{session('msg')}}</p>
        @endif

        <div class="mb-5">
            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
            <input
             type="email"
             id="email"
             name="email"
             placeholder="jhon@gmail.com"
             class="border p-2 w-full rounded-lg @error('email') border-red-500   
             @enderror"
             value="{{ old('email') }}"
            />
            @error('email')
            <p class=" bg-red-500 text-white my-1 rounded-lg text-xs p-1 text-center">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-5">
            <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
            <input
             type="password"
             id="password"
             name="password"
             placeholder="MiPasswod123$"
             class="border p-2 w-full rounded-lg @error('password') border-red-500   
             @enderror"
             
            />
            @error('password')
            <p class=" bg-red-500 text-white my-1 rounded-lg text-xs p-1 text-center">{{$message}}</p>
        @enderror
        </div>  
        
        <div class="mb-5">
            <input type="checkbox" name="remember"> <label class="text-gray-500 text-sm" for="">Keep me Logged in</label>
        </div>

        <input
         type="submit"
         value="Login"
         class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase rounded-lg w-full p-3 font-bold text-white"
         />
      </form>
    </div>
</div>
@endsection