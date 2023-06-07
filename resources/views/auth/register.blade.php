@extends('layouts.app')

@section('title')
Register on Devstagram
@endsection

@section('content')
<div class="md:flex justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{asset('img/registrar.jpg')}}" alt="">
    </div>

    <div class="md:w-4/12 bg-white p-5 rounded-lg shadow-xl">
      <form>
        <div class="mb-5">
            <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Name</label>
            <input
             type="text"
             id="name"
             name="name"
             placeholder="Jhon"
             class="border p-2 w-full rounded-lg"
            />
        </div>

        <div class="mb-5">
            <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">UserName</label>
            <input
             type="text"
             id="username"
             name="username"
             placeholder="Magic"
             class="border p-2 w-full rounded-lg"
            />
        </div>

        <div class="mb-5">
            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
            <input
             type="email"
             id="email"
             name="email"
             placeholder="jhon@gmail.com"
             class="border p-2 w-full rounded-lg"
            />
        </div>

        <div class="mb-5">
            <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
            <input
             type="password"
             id="password"
             name="password"
             placeholder="MiPasswod123$"
             class="border p-2 w-full rounded-lg"
            />
        </div>

        <div class="mb-5">
            <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repeat Password</label>
            <input
             type="password"
             id="password_confirmation"
             name="password_confirmation"
             placeholder="MiPasswod123$"
             class="border p-2 w-full rounded-lg"
            />
        </div>

        <input
         type="submit"
         value="Create"
         class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase rounded-lg w-full p-3 font-bold text-white"
         />
      </form>
    </div>
</div>
@endsection